<template>
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary"
                    @click="showNewPostModal=true"
                >
                <i class="fa fa-pencil"></i> 發文
            </button>
            &nbsp;&nbsp;
            <div class="btn btn-default" v-bind:class="{ 'btn-success': now_filter == 0 }"
                @click.prevent="filteredPosts()">
                全部
            </div>
            <div class="btn btn-default" v-bind:class="{ 'btn-success': category.id == now_filter }"
                v-for="category in board.post_categories"
                @click="filteredPosts(category.id)">
                {{ category.name }}
            </div>
            <post-modal v-if="showNewPostModal" @close="showNewPostModal=false">
                <span slot="header">
                    在 {{ board.name }} 發文
                </span>
                <div slot="body">
                    <div class="form-group">
                        <label for="category">文章分類</label>
                        <select class="form-control" id="category" v-model="post_category">
                              <option v-for="category in board.post_categories" :value="category.id">
                                  {{ category.name }}
                              </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">標題：</label>
                        <input class="form-control" type="text" v-model="title">
                    </div>
                    <div class="form-group">
                        <label for="">內文：</label>
                        <textarea class="form-control" row="8" v-model="content"></textarea>
                    </div>
                </div>
                <div slot="footer">
                    <button class="btn btn-success" @click="newPost()" :disabled="not_working">
                        <i class="fa fa-pencil"></i> 送出不後悔
                    </button>
                </div>
            </post-modal>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <a href="#" class="list-group-item border-bottom"
                    v-for="post in filter_posts"
                    @click.prevent="openPostModal(post)"
                >
                    <h4>{{ '[' + post.post_category.name + '] ' + post.title + ' ' }}</h4>
                    <p>{{ post.created_at }}</p>
                </a>
                <post-modal v-if="showPostModal" @close="showPostModal=false">
                    <span slot="header">
                        {{ '[' + postModal.post_category.name + '] ' + postModal.title + ' ' }}
                    </span>
                    <div slot="body">
                        <h5>{{ postModal.user.name }}<h5>
                        <span class="pre">{{ postModal.content }}</span>
                    </div>
                    <div slot="footer">
                        {{ postModal.created_at }}
                    </div>
                </post-modal>
            </div>
        </div>
    </div>
    <div class="text-center" v-show="loading">
        <i class="fa fa-spinner fa-spin fa-2x"></i>
    </div><br>
    <button class="btn btn-default btn-block"
            @click="attemptLoad(++page)"
            v-show="!stopLoad && !loading" >
        <i class="fa fa-plus"></i> 讀取更多文章
    </button>
    <p v-if="stopLoad">沒有文章了ＱＱ</p>
</div>
</template>

<script>
import newPost from './PostModal.vue'
export default {
    components: {
        'post-modal': newPost
    },
    props: ['bslug'],
    data () {
        return {
            // display
            board: '',
            posts: [],
            now_filter: 0,
            filter_posts: [],
            // infinite scroll
            page: 1,
            stopLoad: false,
            loading: false,
            // Modal
            showNewPostModal: false,
            showPostModal: false,
            postModal: '',
            post_category: 1,
            title: '',
            content: '',
            not_working: true
        }
    },
    watch: {
        showNewPostModal (check) {
            this.modal_open(check);
        },
        showPostModal (check) {
            this.modal_open(check);
        },
        title() {
            this.check_empty()
        },
        content() {
            this.check_empty()
        }
    },
    created () {
        this.$http.get("board/"+this.bslug)
        .then(response => {
            this.board = response.body
        })
        this.attemptLoad(this.page)
    },
    mounted() {
        this.handleScroll()
        window.addEventListener('scroll', this.handleScroll)
    },
    methods: {
        check_empty() {
            if(this.title.length > 0 && this.content.length)
                this.not_working = false
            else
                this.not_working = true
        },
        modal_open(check) {
            if (check) {
                $('body').addClass('modal-open');
            } else {
                $('body').removeClass('modal-open');
            }
        },
        newPost() {
            let data = {
                title: this.title,
                content: this.content,
                post_category: this.post_category
            }
            this.$http.post("p/"+this.bslug, data)
                .then(response => {
                    location.reload()
                })
        },
        openPostModal(post) {
            this.showPostModal = true
            this.postModal = post
        },
        handleScroll () {
            if( $(window).scrollTop() + $(window).height() >= $(document).height()
                && !this.stopLoad && !this.loading ) {
                this.page++
                this.attemptLoad(this.page)
            }
        },
        attemptLoad (page) {
            this.loading = true
            this.$http.get("p/"+this.bslug+"?page="+page)
            .then(response => {
                let data = response.body.data
                if (response.body.next_page_url == null) {
                    this.stopLoad = true
                }
                for (var i = 0, len = data.length; i < len; i++) {
                    this.posts.push(data[i])
                }
                this.filteredPosts(this.now_filter)
                this.loading = false
            })
        },
        filteredPosts (id = 0) {
            this.filter_posts = []
            this.now_filter = id
            if (id == 0) {
                this.filter_posts = this.posts
            } else {
                for (let i = 0; i < this.posts.length; i++) {
                    if (this.posts[i].post_category.id == id) {
                        this.filter_posts.push(this.posts[i])
                    }
                }
            }
        }
    }
}
</script>

<style lang="scss">
.pre {
    white-space: pre;
}
</style>

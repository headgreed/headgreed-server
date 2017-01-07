<template>
<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <button class="btn btn-primary"
                    @click="showNewPostModal=true"
                >
                <i class="fa fa-pencil"></i> 發文
            </button>
            <post-modal v-if="showNewPostModal" @close="showNewPostModal=false">
                <span slot="header">
                    在 {{this.bname}} 發文
                </span>
                <div slot="body">
                    <div class="form-group">
                        <label for="">標題：</label>
                        <input class="form-control" type="text" v-model="title">
                    </div>
                    <label for="">內文：</label>
                    <div class="form-group">
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
                    v-for="post in posts"
                    @click.prevent="openPostModal(post)"
                >
                    <h4>{{ post.title }}</h4>
                    <p>{{ post.created_at }}</p>
                </a>
                <post-modal v-if="showPostModal" @close="showPostModal=false">
                    <span slot="header">
                        {{ postModal.title }}
                    </span>
                    <div slot="body">
                        {{ postModal.content }}
                    </div>
                    <div slot="footer">
                        {{ postModal.created_at }}
                    </div>
                </post-modal>
            </div>
        </div>
    </div>
    <div class="text-center" v-show="loading">
        fuck
        <i class="fa fa-spinner fa-spin fa-2x"></i>
    </div><br>
    <button class="btn btn-default btn-block"
            @click="attemptLoad(++page)"
            v-show="!stopLoad && !loading" >
        <i class="fa fa-plus fa-2x"></i>
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
    props: ['bname', 'bslug'],
    data () {
        return {
            // display
            posts: [],
            // infinite scroll
            page: 1,
            stopLoad: false,
            loading: false,
            // Modal
            showNewPostModal: false,
            showPostModal: false,
            postModal: '',
            title: '',
            content: '',
            user_id: '',
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
        content() {
            if(this.content.length > 0)
                this.not_working = false
            else
                this.not_working = true
        }
    },
    created () {
        this.$http.get("userid")
        .then(response => {
            this.user_id = response.body
        })
        this.$http.get("p/"+this.bslug)
        .then(response => {
            this.posts = response.body.data
        })
    },
    mounted() {
        this.handleScroll()
        window.addEventListener('scroll', this.handleScroll)
    },
    methods: {
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
                user_id: this.user_id
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
            })
            this.loading = false
        }
    }
}
</script>

<style media="screen">

</style>

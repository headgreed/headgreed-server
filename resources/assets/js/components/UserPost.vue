<template lang="html">
<div class="panel panel-default">
    <div class="panel-heading">發過的所有文章</div>
    <div class="panel-body">
        <div class="list-group">
            <a href="#" class="list-group-item border-bottom"
                v-for="post in posts"
                @click.prevent="openPostModal(post)"
            >
                <h4>
                  [{{post.board.name}}] {{post.title}} &nbsp;&nbsp;&nbsp;
                  <span class="text-muted">{{post.created_at}}</span>
                </h4>
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
</template>

<script>
import PostModal from './PostModal.vue'
export default {
    components: {
        'post-modal': PostModal
    },
    data () {
        return {
            posts: [],
            postModal: '',
            showPostModal: false
        }
    },
    created () {
        this.fetchPosts()
    },
    watch: {
        showPostModal (check) {
            this.modal_open(check);
        },
    },
    methods: {
        modal_open(check) {
            if (check) {
                $('body').addClass('modal-open');
            } else {
                $('body').removeClass('modal-open');
            }
        },
        fetchPosts (page) {
            this.$http.get("u/posts")
            .then(response => {
                this.posts = response.body
            })
        },
        openPostModal(post) {
            this.showPostModal = true
            this.postModal = post
        },
    }
}
</script>

<style lang="css">
</style>

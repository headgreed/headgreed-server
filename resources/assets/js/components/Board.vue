<template>
<div>
    <div class="panel panel-default">
        <div class="panel-heading">現在時間：{{ new Date() }}</div>
        <div class="panel-body">
            <div class="list-group">
                <a href="#" v-for="post in posts" class="list-group-item border-bottom">
                    <h4>{{ post.title }}</h4>
                    <p>{{ post.content }}</p>
                    <p>{{ post.created_at }}</p>
                </a>
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
export default {
    props: ['bname', 'bslug'],
    data () {
        return {
            posts: [],
            page: 1,
            stopLoad: false,
            loading: false
        }
    },
    created () {
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
.border-bottom {
    border: 0px solid #d3e0e9;
    border-bottom: 2px solid #d3e0e9;
    /*padding-left: 0;
    padding-right: 0;*/
}
</style>

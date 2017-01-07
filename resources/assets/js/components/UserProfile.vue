<template lang="html">
<div class="panel panel-default">
    <div class="panel-heading">個人資料</div>
    <div class="panel-body">
        <img class="avatar" src="self_avatar"><br><br>
        <form class="form-horizontal" v-on:submit.prevent>
            <div class="form-group">
                <label for="inputFile" class="col-md-2 control-label">更新個人相片</label>
                <div class="col-md-10">
                    <input type="file" class="form-control" id="inputFile" disabled>
                    <span class="help-block">
                        <strong>趕工製作中...</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" v-bind:class="{ 'has-error': errorName }">
                <label class="col-md-2 control-label" for="name">更新暱稱(1~10)</label>
                <div class="col-md-10">
                    <input class="form-control" id="name" v-model="user.name" type="text">
                    <span class="help-block" v-show="errorName">
                        <strong>需介於1至10個字</strong>
                    </span>
                </div>
            </div>
            <div class="form-group" v-bind:class="{ 'has-error': errorAbout }">
                <label class="col-md-2 control-label" for="about">更新自介(0~255)</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="about" rows="10" v-model="user.about"></textarea>
                    <span class="help-block" v-show="errorAbout">
                        <strong>需介於255字</strong>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    <button class="btn btn-lg btn-block btn-primary" @click="updateUser()" :disabled="validateUser">
                        <i class="fa fa-spinner fa-pulse fa-fw" v-show="uploading"></i>
                        <i class="fa fa-upload" v-show="!uploading"></i>
                        更新
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
</template>

<script>
export default {
    data () {
        return {
            user: '',
            uploading: false,
            errorName: false,
            errorAbout: false,
        }
    },
    created () {
        this.getUser()
    },
    computed: {
        validateUser () {
            return this.errorName || this.errorAbout;
        }
    },
    watch: {
        'user.name': function(name) {
            if (name.length < 1 || name.length > 10) {
                this.errorName = true
            } else {
                this.errorName = false
            }
        },
        'user.about' (about) {
            if (about.length > 255) {
                this.errorAbout = true
            } else {
                this.errorAbout = false
            }
        }
    },
    methods: {
        getUser() {
            this.$http.get("user").then(response => {
                this.user = response.body
                // this.name = response.body.name
                // this.about = response.body.about
            })
        },
        updateUser() {
            this.uploading = true
            let data = {
                'name': this.user.name,
                'about': this.user.about
            }
            this.$http.patch("user", data).then(response => {
                console.log(response);
                this.uploading = false
            })
        }
    }
}
</script>

<style lang="css">
.avatar {
    width:10em;
    height:10em;
    border-radius:50%;
}
</style>

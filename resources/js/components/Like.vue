<template>
    <div>
        <p class="text-center" v-if="loading">
            Loading...
        </p>
        <p class="text-center" v-if="!loading">
            <a href="#liked" v-if="liked == false" @click="likeSnippet"><i class="icon-like"></i> Like ({{ this.snippet_likes }})</a>
            <a href="#liked" v-if="liked == true" @click="unlikeSnippet"><i class="icon-like"></i> Unlike ({{ this.snippet_likes }})</a>
        </p>
    </div>

</template>

<script src="{{ asset('assets/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
<script>
    export default {
        data() {
            return {
                liked: false,
                loading: true,
                snippet_likes: this.likes,
            }
        },

        props: ['snippet_id', 'likes'],

        mounted() {
            this.loading = false;
        },

        methods: {
            getAllLikes() {
                axios.get('/get_likes/' + this.snippet_id)
                    .then((res) => {
                        console.log(res);
                    });
            },

            likeSnippet() {
                this.loading = true

                axios.get('/like_snippet/' + this.snippet_id)
                    .then((res) => {
                        this.snippet_likes = res.data;
                        this.loading = false;
                        this.liked = true;
                    });
            },

            unlikeSnippet() {
                this.loading = true

                axios.get('/unlike_snippet/' + this.snippet_id)
                    .then((res) => {
                        if (res.data)
                            this.$data.liked = false;
                            this.loading = false;
                            this.likes -= 1;
                    });            
            }
        }
    }
</script>
<template>
    <div>
        <p class="text-center" v-if="loading">
            Loading...
        </p>
        <p class="text-center" v-if="!loading">
            <button class="btn btn-primary btn-block" v-if="status == 0"><i class="fa fa-plus m-r-xs"></i>Follow</button>
            <button class="btn btn-primary btn-block" v-if="status == 'friends'"><i class="fa fa-plus m-r-xs"></i>Unfollow</button>
            <button class="btn btn-primary btn-block" v-if="status == 'pending'"><i class="fa fa-plus m-r-xs"></i>Accept Pending Request</button>
            <span class="text-success" v-if="status == 'waiting'">Waiting for response</span>
        </p>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                status: '',
                loading: true,
            }
        },
        mounted() {
            axios.get('/check_relationship_status/' + this.profile_user_id)
                .then((res) => {
                    console.log(res);
                    this.status = res.data.status;
                    this.loading = false;
                });
        },
        props: ['profile_user_id'],
    }
</script>
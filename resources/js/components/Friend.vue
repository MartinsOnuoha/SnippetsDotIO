<template>
    <div>
        <p class="text-center" v-if="loading">
            Loading...
        </p>
        <p class="text-center" v-if="!loading">
            <button class="btn btn-primary btn-block" v-if="status == 0" @click="addFriend"><i class="fa fa-plus m-r-xs"></i>Connect</button>
            <button class="btn btn-primary btn-block" v-if="status == 'friends'" @click="disconnectFriend"><i class="fa fa-expand m-r-xs"></i>Disconnect</button>
            <button class="btn btn-primary btn-block" v-if="status == 'pending'" @click="acceptFriend"><i class="fa fa-compress m-r-xs"></i>Accept Pending Request</button>
            <span class="text-success" v-if="status == 'waiting'">Connection request sent</span>
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

        props: ['profile_user_id'],

        mounted() {
            axios.get('/check_relationship_status/' + this.profile_user_id)
                .then((res) => {
                    this.status = res.data.status;
                    this.loading = false;
                });
        },

        methods: {
            addFriend() {
                this.loading = true

                axios.get('/add_friend/' + this.profile_user_id)
                    .then((res) => {
                        if (res.data == 1)
                            this.loading = false;
                            this.status = 'waiting';
                            swal({
                                position: 'top-end',
                                type: 'success',
                                title: 'Connection request sent',
                                showConfirmButton: false,
                                timer: 2000
                            })
                    });
            },

            acceptFriend() {
                this.loading = true;

                axios.get('/accept_friend/' + this.profile_user_id)
                    .then((res) => {
                        if (res.data == 1)
                            this.loading = false;
                            this.status = 'friends';
                            swal({
                                position: 'top-end',
                                type: 'success',
                                title: 'You are now connected',
                                showConfirmButton: false,
                                timer: 2000
                            });
                    });
            },

            disconnectFriend() {
                this.loading = true;

                axios.delete('/delete_friend/' + this.profile_user_id)
                    .then((res) => {
                        if (res.data == 1)
                            this.loading = false;
                            this.status = 0;
                            swal({
                                position: 'top-end',
                                type: 'success',
                                title: 'You have disconnected this user',
                                showConfirmButton: false,
                                timer: 2000
                            });
                    });
            }
        }
    }
</script>
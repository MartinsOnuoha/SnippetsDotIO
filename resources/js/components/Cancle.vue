<template>
    <div>
        <p class="text-center" v-if="loading">
            Loading...
        </p>
        <p class="text-center" v-if="!loading">
            <button class="btn btn-danger btn-block" v-if="status == 'waiting'" @click="cancleRequest"><i class="fa fa-times m-r-xs"></i>Cancle</button>
        </p>
    </div>

</template>

<script src="{{ asset('assets/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
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
            getWatingRequests() {
                axios.get('/waiting_requests')
                    .then((res) => {
                        $("#pending-req-div").load(location.href + " #pending-req-div");
                    });
            },

            cancleRequest() {
                this.loading = true

                axios.get('/cancle_request/' + this.profile_user_id)
                    .then((res) => {
                        if (res.data == 1)
                            this.loading = false;
                            this.status = 'waiting';
                            swal({
                                position: 'top-end',
                                type: 'success',
                                title: 'Connection request cancled',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        this.getWatingRequests();
                    });
            },
        }
    }
</script>
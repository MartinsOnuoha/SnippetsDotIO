<template>
    <div>
        <p class="text-center" v-if="loading">
            Loading...
        </p>
        <p class="text-center" v-if="!loading">
            <button class="btn btn-primary btn-block" v-if="!interest" @click="showInterest"><i class="fa fa-check m-r-xs"></i>I'm Interested</button>
            <span class="text-success" v-if="interest">You've shown interest in this</span>
        </p>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                loading: true,
                interest: false
            }

        },
        mounted() {
            this.loading = false;
        },
        methods: {
            showInterest() {
                swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'You have shown interest',
                    showConfirmButton: false,
                    timer: 2000
                });
                this.interest = true;
            }
        }
    }
</script>
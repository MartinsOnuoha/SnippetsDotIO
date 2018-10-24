<template>
    <div>
        <p class="text-center" v-if="loading">
            Loading...
        </p>
        <p class="text-center" v-if="!loading">
            <button class="btn btn-primary btn-block" v-if="interest == false" @click="addFriend"><i class="fa fa-plus m-r-xs"></i>Connect</button>
            <button class="btn btn-primary btn-block" v-if="status == 'friends'" @click="disconnectFriend"><i class="fa fa-expand m-r-xs"></i>Disconnect</button>
            <button class="btn btn-primary btn-block" v-if="status == 'pending'" @click="acceptFriend"><i class="fa fa-compress m-r-xs"></i>Accept Pending Request</button>
            <span class="text-success" v-if="status == 'waiting'">Connection request sent</span>
        </p>
    </div>

</template>

<script>
    export default {
        mounted() {

        },
        methods: {

        }
    }
</script>
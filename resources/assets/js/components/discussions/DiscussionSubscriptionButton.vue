<template>
    <div>
        <a href="#" class="btn btn-secondary" @click.prevent="toggleSubscription" v-if="discussion.has_user_subscribed">
            <i class="fa fa-heart"></i>
        </a>
        <a href="#" class="btn btn-outline-secondary" @click.prevent="toggleSubscription" v-else>
            <i class="fa fa-heart-o"></i>
        </a>
    </div>
</template>

<script>
    export default {
        props: {
            discussion: {
                type: Object,
                required: true,
            },
        },

        methods: {
            toggleSubscription() {
                window.axios.post(`/discussions/${this.discussion.id}/subscription`).then(() => {
                    window.toastr.success("Your subscription to this discussion has been updated.");
                })
            },
        },
    }
</script>

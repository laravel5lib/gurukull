<template>
    <div class="list-group-item list-group-item-action mb-3">
        <a href="#!"  @click.prevent="markAsRead" class="list-group-item-action d-flex">
            <slot></slot>
        </a>
        <b-modal v-model="modalShow"  @shown="scrollToBottom" @hidden="reloadPage" size="lg" busy lazy centered hide-footer>
            <div slot="modal-title">
                <div class="d-flex align-items-center">
                    <div class="mr-1">
                        <discussion-subscription-button :discussion="discussion"></discussion-subscription-button>
                    </div>

                    <div>
                        {{ discussion.title }}
                    </div>
                </div>

            </div>

            <div id="dmhscrollingelement" class="discussion-container mb-3 px-1" style="height: 65vh; overflow-y: scroll;">
                <discussion-topic :discussion="discussion" :members="members" :group="group"></discussion-topic>

                <discussion-reply
                        v-for="reply in discussion.replies"
                        :key="reply.id"
                        :discussion="discussion"
                        :reply="reply"
                        :group="group"
                        :members="members">
                </discussion-reply>
            </div>

            <discussion-add-reply :discussion="discussion"></discussion-add-reply>
        </b-modal>
    </div>
</template>

<script>
    import DiscussionThread from "../../mixins/DiscussionThread.js";
    import DiscussionSubscriptionButton from "./DiscussionSubscriptionButton.vue";

    export default {
        mixins: [
            DiscussionThread
        ],

        components: {
            DiscussionSubscriptionButton,
        },

        data() {
            return {
                modalShow: false,
            };
        },

        updated(){
            this.scrollToBottom();
        },

        methods: {
            /**
             * Scroll to Last Reply.
             */
            scrollToBottom(){
                if(this.modalShow){
                    let container = this.$el.querySelector("#dmhscrollingelement");
                    container.scrollTop = container.scrollHeight;
                };
            },

            markAsRead() {
                this.modalShow = true;

                window.axios.post(`/discussions/${this.discussion.id}/mark-as-read`);
            },

            reloadPage() {
                location.reload(true);
                console.log('you suck');
                
            }


        },
        
    };
</script>
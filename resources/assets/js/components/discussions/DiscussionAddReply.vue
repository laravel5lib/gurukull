<template>
    <form @submit.prevent="onSubmit">
        <div>
            <input-checkbox label="Is this urgent?" v-model="form.data.is_urgent" :error="form.errors.get('is_urgent')">
            </input-checkbox>
        </div>

        <div class="d-flex">
            <div style="flex-grow: 1">
                <input-text-area
                        v-model="form.data.body"
                        :error="form.errors.get('body')">
                </input-text-area>
            </div>

            <input-submit label="Leave reply" :disabled="this.form.isSubmitting" class="ml-2"></input-submit>
        </div>
    </form>
</template>

<script>
    import Form from "../../utilities/Form";

    import InputCheckbox from "../inputs/InputCheckbox.vue";
    import InputTextArea from "../inputs/InputTextArea.vue";
    import InputSubmit from "../inputs/InputSubmit.vue";

    export default {
        components: {
            InputCheckbox,
            InputTextArea,
            InputSubmit,
        },

        props: {
            discussion: {
                type: Object,
                required: true,
            },
        },

        data() {
            return {
                form: new Form({
                    body: "",
                    is_urgent: false,
                }),
            };
        },

        methods: {
            /**
             * Triggers when the form has submitted.
             */
            onSubmit() {
                this.form.post(`/discussions/${this.discussion.id}/replies`)
                    .then(data => {
                        this.form.data.body = "";
                        this.form.data.is_urgent = false;

                        toastr.success("Your reply has been added successfully.");
                    });
            },
        },
    };
</script>

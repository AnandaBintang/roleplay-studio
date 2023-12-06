<template>
    <div>
        <textarea ref="editor"></textarea>
    </div>
</template>

<script>
    export default {
        mounted() {
            ClassicEditor
                .create(this.$refs.editor)
                .catch(error => {
                    console.error(error);
                });
        }
    };
</script>

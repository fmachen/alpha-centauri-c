<template id="panel">
    <div class="panel" v-bind:class="{ 'panel--open': open}">
        <div class="panel__header" @click="togglePanel">
            <div class="panel__tab">
                <slot name="icon">
                    <!--<i class="icon">-->
                    <!--svg-->
                    <!--</i>-->
                </slot>
            </div>
            <h2 class="panel__title">
                {{ title }}
            </h2>
        </div>
        <div class="panel__content">
            <slot name="content">

            </slot>
        </div>
    </div>
</template>

<script>
    module.exports = {
        data: () => {
            return {
                'open': false
            }
        },
        props: ['title'],
        methods: {
            togglePanel: function () {
                return this.open = !this.open;
            }
        }
    }
</script>
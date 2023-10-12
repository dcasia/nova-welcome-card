<template>

    <div class="nova-welcome-card flex justify-center items-center">

        <div class="w-full">

            <Heading v-if="card.title">{{ card.title }}</Heading>

            <p v-if="card.description" class="leading-tight mt-3" v-html="card.description"/>

            <Card :class="{ 'mt-8': card.title || card.description }">

                <div class="md:grid md:grid-cols-2">

                    <div v-for="(item, index) of card.items"
                         :class="match({
                            'md:border-r md:border-b-0 border-b': card.items.length - index === 2,
                            '': card.items.length - index === 1,
                            'md:border-r border-b': index % 2 === 0,
                            'border-b': index % 2 !== 0,
                         })"
                         class="item">

                        <div class="flex p-6">

                            <div class="flex justify-center w-11 flex-shrink-0 mr-6 text-primary-500 dark:text-primary-600">

                                <template v-if="item.icon.trim().startsWith('<svg')">
                                    <div v-html="item.icon"/>
                                </template>

                                <Icon v-else :type="item.icon" :width="40" :height="40"/>

                            </div>

                            <div>

                                <Heading :level="3">
                                    {{ item.title }}
                                </Heading>

                                <p class="leading-normal mt-3" v-html="item.content"/>

                            </div>

                        </div>

                    </div>

                </div>

            </Card>

        </div>

    </div>

</template>

<script>

    export default {
        name: 'WelcomeCard',
        props: { card: Object },
        methods: {
            match(cases) {

                for (const key in cases) {

                    if (cases[ key ] === true) {
                        return key
                    }

                }

            },
        },
    }

</script>

<style>

    .dark .nova-welcome-card .item {
        @apply border-gray-700;
    }

    .nova-welcome-card .item {
        @apply border-gray-200;
    }

    .nova-welcome-card svg {
        @apply w-10 h-10;
    }

</style>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Primary Navigation Menu -->
            <TopMenu />

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <SimpleNotification  v-if="$page.props.flash.message" @close="showNotification = false" :show="showNotification">
                    <template #title>
                        {{ $page.props.flash.message.title }}
                    </template>

                    {{ $page.props.flash.message.msg }}
                </SimpleNotification>

                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
    import {ref} from 'vue';
    import { Head } from '@inertiajs/vue3';
    import Banner from '@/Components/Banner.vue';
    import TopMenu from "@/Customs/Menus/TopMenu.vue";
    import SimpleNotification from "@/Customs/Notifications/SimpleNotification.vue";

    const showNotification = ref(true);

    defineProps({
        title: String,
    });

</script>

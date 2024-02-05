<template>
    <TransitionRoot :id="`modal-${imageSrc}`" as="template" :show="showImage">
        <Dialog as="div" class="relative z-9" @close="$emit('close')">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 hidden bg-gray-500 bg-opacity-75 transition-opacity md:block" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">
                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden md:inline-block md:h-screen md:align-middle" aria-hidden="true">&#8203;</span>
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 md:translate-y-0 md:scale-95" enter-to="opacity-100 translate-y-0 md:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 md:scale-100" leave-to="opacity-0 translate-y-4 md:translate-y-0 md:scale-95">
                        <DialogPanel class="flex w-full transform text-center text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
                            <div class="relative flex w-full items-center overflow-hidden bg-white px-4 pt-14 pb-8 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                                <div class="aspect-w-2 aspect-h-3 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">
                                    <img :src="`/storage/${props.imageSrc}`" class="object-cover object-center image600" />
                                </div>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
    import { ref } from 'vue';
    import {
        Dialog,
        DialogPanel,
        TransitionChild,
        TransitionRoot,
    } from '@headlessui/vue';
    import { XMarkIcon } from '@heroicons/vue/24/outline';

    const open = ref(false)

    const props = defineProps({
        showImage: {
            type: Boolean,
            default: false
        },
        imageSrc: {
            type: String,
            default: ""
        }
    })
</script>

<style scoped>
    .image600{
        width:100%;
        max-width:800px;
    }
</style>

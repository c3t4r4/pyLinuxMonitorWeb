<template>
    <div class="mt-8 flow-root">
        <div class="-my-2 overflow-x-auto ">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <!-- BEGIN: Table -->
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <slot name="header" />
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        <slot/>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

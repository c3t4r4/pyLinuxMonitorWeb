<template>
    <div>
        <textarea v-if="props.readonly === 'true'" :id="inputID" :rows="rows" :value="modelValue" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" readonly/>

        <textarea v-else :id="inputID" :rows="rows" :value="modelValue" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" @input="emits('update:modelValue', $event.target.value)"/>
    </div>
</template>

<script setup>
    const emits = defineEmits([
        'update:modelValue',
    ]);

    const props = defineProps({
        modelValue: {
            type: String,
            default: ""
        },
        rows: {
            type: Number,
            default: 3
        },
        error: {
            type: String,
            default: ""
        },
        inputID: {
            type: String,
            default: ""
        },
        readonly: {
            type: String,
            default: ""
        }
    });
</script>

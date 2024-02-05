<template>
    <select :id="inputID" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)">
        <option v-if="selectEmpty" value="">Selecione</option>
        <slot />
    </select>
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
        selectEmpty: {
            type: Boolean,
            default: true
        },
        error: {
            type: String,
            default: ""
        }
        ,
        inputID: {
            type: String,
            default: ""
        }
    });
</script>

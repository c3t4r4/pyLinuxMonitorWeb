<template>
    <input :id="inputID" type="text" v-if="doctype === 'CNPJ'" v-maska data-maska="##.###.###/####-##" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'CPF'" v-maska data-maska="###.###.###-##" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'RG'" v-maska data-maska='["##.###.###-*", "#.###.###-*"]' class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'RE'" v-maska data-maska='["#####-*", "######-*", "#######-*"]' class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'CEP'" v-maska data-maska="#####-###" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'CNS'" v-maska data-maska="### ##### #### ####" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'TITULO-ELEITOR'" v-maska data-maska="#####.####.####" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'CARTAO-CREDITO'" v-maska data-maska="##### #### #### ####" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'CNH'" v-maska data-maska="###########-##" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'CNAE'" v-maska data-maska="####-#/##" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'PASSAPORTE'" v-maska data-maska="**######" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'IMEI'" v-maska data-maska="###.###.###.###.###" class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else-if="doctype === 'PHONE'" v-maska data-maska='["(##) #####-####", "(##) ####-####"]' class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>

    <input :id="inputID" type="text" v-else class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" :value="modelValue" @input="emits('update:modelValue', $event.target.value)"/>
</template>

<script setup>
    import { vMaska } from "maska";

    const emits = defineEmits([
        'update:modelValue',
    ]);

    const props = defineProps({
        modelValue: {
            type: String,
            default: ""
        },
        doctype: {
            type: String,
            default: ""
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

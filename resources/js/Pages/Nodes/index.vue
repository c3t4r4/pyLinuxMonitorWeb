<template>
    <DefaultPanel title="Nodes">
        <TableContent>
            <template #headerPage>
                <div class="flex-1 mt-3 px-2 flex justify-center lg:ml-6 lg:justify-end">
                    <div class="max-w-lg w-full lg:max-w-xs">
                        <label class="relative block">
                            <span class="sr-only">Search</span>
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                            <MagnifyingGlassIcon class="h-5 w-5 fill-slate-300"/>
                                        </span>
                            <input v-model="search" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm hover:border-sky-500 hover:ring-sky-500 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Pesquisar..." type="text" id="Search"/>
                        </label>
                    </div>

                    <div class="ml-6 max-w-lg  lg:max-w-xs">
                        <Link as="button" :href="route(`nodes.create`)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-700 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-800 focus:ring-offset-2 sm:w-auto hover:-translate-y-1 hover:scale-110 duration-300">Novo</Link>
                    </div>
                </div>
            </template>

            <TableModel>
                <template #header>
                    <tr class="divide-x divide-gray-300">
                        <th scope="col" class="px-4 py-3.5 text-center text-sm font-semibold text-gray-900">Name</th>
                        <th scope="col" class="px-4 py-3.5 text-center text-sm font-semibold text-gray-900">Hostname</th>
                        <th scope="col" class="px-4 py-3.5 text-center text-sm font-semibold text-gray-900">Grupo</th>
                        <th scope="col" class="px-4 py-3.5 text-center text-sm font-semibold text-gray-900">Data Criação</th>
                        <th scope="col" class="px-4 py-3.5 text-center text-sm font-semibold text-gray-900">Data Atualização</th>
                        <th scope="col" class="py-3.5 pl-4 pr-4 text-center text-sm font-semibold text-gray-900 sm:pr-6">Ações</th>
                    </tr>
                </template>

                <tr v-for="(item, itemIndex) in nodes.data" :key="itemIndex" class="divide-x divide-gray-300" :class="[itemIndex % 2 !== 0 ? 'bg-gray-50 hover:bg-gray-200' : 'bg-white hover:bg-gray-200']">

                    <td class="whitespace-nowrap text-center p-4 text-sm" :title="item.id">
                        {{ item.name }}
                    </td>

                    <td class="whitespace-nowrap text-center p-4 text-sm" :title="item.id">
                        {{ item.hostname ?? '-' }}
                    </td>

                    <td class="whitespace-nowrap text-center p-4 text-sm" :title="item.id">
                        {{ item.group.name }}
                    </td>

                    <td class="whitespace-nowrap text-center p-4 text-sm">
                        {{ (item.created_at ? moment(item.created_at).format("DD/MM/YYYY H:mm:ss") : "-") }}
                    </td>

                    <td class="whitespace-nowrap text-center p-4 text-sm">
                        {{ (item.updated_at ? moment(item.updated_at).format("DD/MM/YYYY H:mm:ss") : "-") }}
                    </td>

                    <td class="whitespace-nowrap text-center py-4 pl-4 pr-4 text-sm sm:pr-6">
                        <div class="flex justify-center items-center space-x-2">

                            <button title="Copiar ID" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-purple-600 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" @click="copyToClipboard(item.id)">
                                <ClipboardDocumentIcon class="h-5 w-5" aria-hidden="true" />
                            </button>

                            <TableButton type="show" :routeitem="route(`nodes.show`, item.id)" method="get" />
                            <TableButton type="edit" :routeitem="route(`nodes.edit`, item.id)" method="get" />
                            <TableButton type="delete" :routeitem="route(`nodes.destroy`, item.id)" method="delete" />
                        </div>
                    </td>
                </tr>

            </TableModel>

            <template #pagination>
                <TablePagination :objectData="nodes"/>
            </template>
        </TableContent>
    </DefaultPanel>
</template>

<script setup>
    import TableContent from "@/Customs/Tables/TableContent.vue";

    import {
        ClipboardDocumentIcon,
        MagnifyingGlassIcon
    } from '@heroicons/vue/24/solid';

    import { Link, router } from '@inertiajs/vue3';
    import debounce from "lodash/debounce";
    import {ref, watch} from "vue";
    import moment from "moment";
    import TablePagination from "@/Customs/Tables/TablePagination.vue";
    import TableButton from "@/Customs/Tables/TableButton.vue";
    import TableModel from "@/Customs/Tables/TableModel.vue";
    import DefaultPanel from "@/Customs/Panels/DefaultPanel.vue";

    const props = defineProps({
        nodes: Object,
        filters: Object
    });

    let search = ref(props.filters.search);

    const copyToClipboard = async (textToCopy) => {
        try {
            await navigator.clipboard.writeText(textToCopy);
            console.log('Texto copiado para a área de transferência!');
        } catch (err) {
            console.error('Falha ao copiar texto: ', err);
        }
    };

    watch(search,  debounce(function (value) {
        router.get(route("nodes.index"), { search:value }, {
            preserveState: true
        });
    }, 300));
</script>

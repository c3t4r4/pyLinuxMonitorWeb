<template>
    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 sm:mt-5 md:rounded-lg">
        <div class="flex-1 flex justify-between sm:hidden">
            <Link v-if="objectData.prev_page_url" :href="objectData.prev_page_url" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-200 hover:-translate-y-1 hover:scale-110 duration-300"> Anterior </Link>

            <Link v-else href="" aria-disabled="true" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-gray-100" disabled> Anterior </Link>


            <Link v-if="objectData.next_page_url" :href="objectData.next_page_url" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-200 hover:-translate-y-1 hover:scale-110 duration-300"> Próximo </Link>

            <Link v-else href="" aria-disabled="true" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-gray-100" disabled> Próximo </Link>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p v-if="objectData.total !== '0'" class="text-sm text-gray-700">
                    Exibindo
                    {{ ' ' }}
                    <span class="font-medium">{{ objectData.from }}</span>
                    {{ ' ' }}
                    à
                    {{ ' ' }}
                    <span class="font-medium">{{ objectData.to }}</span>
                    {{ ' ' }}
                    de
                    {{ ' ' }}
                    <span class="font-medium">{{ objectData.total }}</span>
                    {{ ' ' }}
                    <span v-if="objectData.total !== '1'">Registros</span>
                    <span v-else>Registro</span>
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <Link v-if="objectData.prev_page_url" :href="objectData.prev_page_url" class="disabled relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 hover:-translate-y-1 hover:scale-110 duration-300">
                        <span class="sr-only">Anterior</span>
                        <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
                    </Link>
                    <Link v-else href="" class="disabled pointer-events-none relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-gray-200 text-sm font-medium text-gray-500 hover:bg-gray-50" disabled>
                        <span class="sr-only">Anterior</span>
                        <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
                    </Link>

                    <Link v-for="(linkObj, linkIndex) in links" :key="linkIndex" :href="linkObj.url" aria-current="page" :class="[linkObj.active ? 'z-10 bg-blue-300 border-black text-black inline-flex font-bold' : 'font-medium bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex ']" class="relative items-center px-4 py-2 border text-sm hover:-translate-y-1 hover:scale-110 duration-300"> {{ linkObj.label }} </Link>


                    <Link v-if="objectData.next_page_url" :href="objectData.next_page_url" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 hover:-translate-y-1 hover:scale-110 duration-300" title="Próximo">
                        <span class="sr-only">Próximo</span>
                        <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
                    </Link>
                    <Link v-else aria-disabled="true" href="" class="disabled pointer-events-none relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-gray-200 text-sm font-medium text-gray-500 hover:bg-gray-50" title="Próximo" disabled>
                        <span class="sr-only">Próximo</span>
                        <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
                    </Link>
                </nav>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { computed } from 'vue'
    import { Link } from '@inertiajs/vue3'
    import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/24/solid'

    const props = defineProps({
        objectData: Object,
    });

    const links = computed(() => {
        let sizeArray = 10;
        let linksOld =  props.objectData.links;
        linksOld.shift();
        linksOld.pop();

        return linksOld.slice(0,sizeArray);
    });
</script>

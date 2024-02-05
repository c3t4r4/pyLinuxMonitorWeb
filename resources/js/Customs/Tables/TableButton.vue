<template>
    <div>
        <Link v-if="type === 'show'" :href="routeitem" :method="method" title="Ver" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-blue-600 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" as="button">
            <MagnifyingGlassIcon class="h-5 w-5" aria-hidden="true" />
        </Link>

        <Link v-if="type === 'edit'" :href="routeitem" :method="method" title="Editar" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-yellow-600 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" as="button">
            <PencilSquareIcon class="h-5 w-5" aria-hidden="true" />
        </Link>

        <button v-if="type === 'delete'" @click="destroy(routeitem)" title="Excluir" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-red-600 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" as="button">
            <TrashIcon class="h-5 w-5" aria-hidden="true" />
        </button>

        <Link v-if="type === 'activate'" :href="routeitem" :method="method" title="Ativar" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-green-600 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" as="button">
            <BoltIcon class="h-5 w-5" aria-hidden="true" />
        </Link>

        <Link v-if="type === 'deactivate'" :href="routeitem" :method="method" title="Desativar" class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-red-600 hover:-translate-y-1 hover:scale-110 duration-300 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" as="button">
            <BoltSlashIcon class="h-5 w-5" aria-hidden="true" />
        </Link>
    </div>
</template>

<script setup>
    import { Link, router } from '@inertiajs/vue3';
    import Swal from 'sweetalert2';

    import { MagnifyingGlassIcon, PencilSquareIcon, TrashIcon, BoltIcon, BoltSlashIcon } from '@heroicons/vue/24/solid';

    const props = defineProps({
        type: String,
        routeitem: String,
        method: String,
    });

    function destroy(url) {
        Swal.fire({
            title: 'Deseja Realmente Excluir ?',
            text: 'O registro será permanentemente excluído!',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: 'Sim',
            denyButtonText: 'Não'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                router.delete(url);
                Swal.fire('Excluído com Sucesso!', '', 'success')

            } else if (result.isDenied) {
                Swal.fire('O registro não foi Excluído', '', 'info')
            }
        })
    }
</script>

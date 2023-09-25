<script setup>
import { Head, Link } from '@inertiajs/vue3';

import { onMounted, ref } from 'vue';

const props = defineProps({
    events: Object
});

const events = ref([{
    'id' : 0,
    'name': '',
    'description': '',
    'shortDescription': '',
    'startsAtDate': '',
    'startsAtTime': '',
    'durationTime': '',
    'endsAtDate': '',
    'endsAtTime': '',
    expired: false,
    'image': {
        'path': ''
    },
    'address': {
        'address': '',
        'neighborhood': '',
        'city': '',
        'uf': '',
        'number': 0,
        'zipCode': ''
    }
}]);

onMounted(() => {
    console.log(props.events);

    events.value = props.events.data;
});

</script>

<template>
    <Head title="Eventos eletrizantes" />
    <header class="d-flex justify-space-between">
        <h1 class="d-inline-block">Retroarch Eventos</h1>
        <Link class="d-inline-block text-end me-5 mt-1 p-1" href="/login">Login</Link>
    </header>

    <main class="container-fluid">
        <h2>Eventos</h2>

        <div class="d-flex justify-content-evenly">
            <Link v-show="props.events.links.prev" as="button" class="btn btn-sm btn-primary mx-3" :href="props.events.links.prev ?? '/'">Anterior</Link>
            <small class="text-center">Página {{ props.events.meta.current_page }} de {{ props.events.meta.last_page }}</small>
            <Link v-show="props.events.links.next" as="button" class="btn btn-sm btn-primary mx-3" :href="props.events.links.next ?? '/'">Próximo</Link>
        </div>

        <div class="card m-5 p-3" v-for="e of events" :key="e.id" :class="e.expired ? 'expired' : ''">
            <h5>{{ e.name }} <small class="text-secondary">{{ e.expired ? 'expirado' : '' }}</small></h5>
            <div class="d-flex">
                <img :src="e.image.path" :alt="e.name + ' imagem'">
                <p class="text-center">{{ e.shortDescription }} <Link :href="'/events/'+e.id">Ler mais</Link></p>
            </div>
            <div class="d-flex justify-content-between">
                <span class="d-block">Começa as: {{ e.startsAtDate +' as '+ e.startsAtTime }}</span>
                <span class="d-block">Termina as: {{ e.endsAtDate + ' as ' + e.endsAtTime}}</span>
            </div>
            <p class="m-3">{{ e.address.city }}</p>
            <Link :href="'/events/'+e.id" as="button" type="button" class="btn btn-lg btn-primary mx-3">Saiba Mais</Link>
        </div>
        <div class="d-flex justify-content-evenly m-3">
            <Link v-show="props.events.links.prev" as="button" class="btn btn-lg btn-primary mx-3" :href="props.events.links.prev ?? '/'">Anterior</Link>
            <small class="text-center">Página {{ props.events.meta.current_page }} de {{ props.events.meta.last_page }}</small>
            <Link v-show="props.events.links.next" as="button" class="btn btn-lg btn-primary mx-3" :href="props.events.links.next ?? '/'">Próximo</Link>
        </div>
    </main>
</template>

<style scoped>
.expired{
    opacity: 0.7;
}
</style>
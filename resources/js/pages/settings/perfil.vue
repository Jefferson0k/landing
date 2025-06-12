<template>
    <div>
        <h1 class="text-xl font-bold mb-2">Información del perfil</h1>
        <p class="mb-6">Actualiza tu información personal para la verificación y firma del contrato</p>
        <form @submit.prevent="submit" class="space-y-6">
            <!-- Nombre -->
            <div class="grid gap-2">
                <label for="name" class="font-medium">Nombres</label>
                <InputText id="name" class="w-full" v-model="form.name" required placeholder="Nombres completos" />
                <Message v-if="form.errors.name" severity="error" class="mt-2">{{ form.errors.name }}</Message>
            </div>

            <!-- Apellidos -->
            <div class="grid gap-2">
                <label for="apellidos" class="font-medium">Apellidos</label>
                <InputText id="apellidos" class="w-full" v-model="form.apellidos" required placeholder="Apellidos completos" />
                <Message v-if="form.errors.apellidos" severity="error" class="mt-2">{{ form.errors.apellidos }}</Message>
            </div>

            <!-- DNI -->
            <div class="grid gap-2">
                <label for="dni" class="font-medium">DNI</label>
                <InputText id="dni" class="w-full" v-model="form.dni" required placeholder="Número de DNI" />
                <Message v-if="form.errors.dni" severity="error" class="mt-2">{{ form.errors.dni }}</Message>
            </div>

            <!-- Email -->
            <div class="grid gap-2">
                <label for="email" class="font-medium">Correo electrónico</label>
                <InputText id="email" type="email" class="w-full" v-model="form.email" required placeholder="Correo electrónico" />
                <Message v-if="form.errors.email" severity="error" class="mt-2">{{ form.errors.email }}</Message>
            </div>

            <!-- Verificación de correo -->
            <div v-if="mustVerifyEmail && !user.email_verified_at" class="text-sm text-gray-600">
                <p>
                    Tu correo electrónico no está verificado.
                    <Link :href="route('verification.send')" method="post" as="button"
                        class="text-blue-600 underline hover:text-blue-800 ml-1">
                        Haz clic aquí para reenviar el correo de verificación.
                    </Link>
                </p>
                <p v-if="status === 'verification-link-sent'" class="mt-2 text-green-600 font-medium">
                    Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                </p>
            </div>

            <!-- Botón submit -->
            <div class="flex items-center gap-4">
                <Button type="submit" :loading="form.processing" label="Actualizar" />
                <Transition enter-active-class="transition-opacity duration-300" enter-from-class="opacity-0"
                    leave-active-class="transition-opacity duration-300" leave-to-class="opacity-0">
                    <p v-show="form.recentlySuccessful" class="text-sm text-green-600">Guardado exitosamente.</p>
                </Transition>
            </div>
        </form>

        <!-- Integraciones -->
        <keynua/>
        <DeleteUser/>
    </div>
</template>

<script setup lang="ts">
import { useForm, usePage, Link } from '@inertiajs/vue3'
import InputText from 'primevue/inputtext'
import Button from 'primevue/button'
import Message from 'primevue/message'
import { Transition } from 'vue'
import DeleteUser from './DeleteUser.vue'
import keynua from './keynua.vue'

interface Props {
    mustVerifyEmail: boolean;
    status?: string;
}
const props = defineProps<Props>();
const mustVerifyEmail = props.mustVerifyEmail;
const status = props.status;

const page = usePage<{ auth: { user: { name: string; apellidos: string; dni: string; nacimiento: string; email: string; email_verified_at: string | null } } }>();
const user = page.props.auth.user;

const form = useForm({
    name: user.name,
    apellidos: user.apellidos,
    dni: user.dni,
    email: user.email,
});

const submit = () => {
    form.patch(route('profile.update'), {
        preserveScroll: true,
    });
};
</script>

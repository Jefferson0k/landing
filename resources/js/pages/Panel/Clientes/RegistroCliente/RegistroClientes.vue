<script setup>
import FloatingConfigurator from '@/components/FloatingConfigurator.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import { useToast } from 'primevue/usetoast';
import Password from 'primevue/password';
import Checkbox from 'primevue/checkbox';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Message from 'primevue/message';
import InlineMessage from 'primevue/inlinemessage';
import RadioButton from 'primevue/radiobutton';
import Card from 'primevue/card';
import Divider from 'primevue/divider';

defineProps({
    status: String,
    canResetPassword: Boolean
});

const selectedProfile = ref('investor');
const acceptTerms = ref(false);
const toast = useToast();

const form = useForm({
    profile_type: 'investor',
    // Campos para inversionista
    first_name: '',
    paternal_surname: '',
    maternal_surname: '',
    alias: '',
    document_number: '',
    email: '',
    phone: '+51',
    password: '',
    password_confirmation: '',
    accept_terms: false
});

// Validación de contraseña
const passwordValidation = computed(() => {
    const password = form.password;
    const hasUppercase = /[A-Z]/.test(password);
    const hasNumber = /\d/.test(password);
    const hasMinLength = password.length >= 6;

    return {
        hasUppercase,
        hasNumber,
        hasMinLength,
        isValid: hasUppercase && hasNumber && hasMinLength
    };
});

const passwordsMatch = computed(() => {
    return form.password === form.password_confirmation && form.password !== '';
});

const submit = () => {
    form.profile_type = selectedProfile.value;
    form.accept_terms = acceptTerms.value;

    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};

const switchProfile = (type) => {
    selectedProfile.value = type;
    
    // Mostrar toast cuando selecciona perfil empresa
    if (type === 'company') {
        toast.add({
            severity: 'info',
            summary: 'Perfil Empresa',
            detail: 'Si eres empresa te invitamos a que te contactes con uno de nuestros asesores',
            life: 8000
        });
    }
    
    // Limpiar formulario al cambiar de perfil
    form.reset();
    acceptTerms.value = false;
    if (type === 'investor') {
        form.phone = '+51';
    }
};
</script>

<template>
    <FloatingConfigurator />
    <Toast position="top-center" />

    <Head title="Registro" />
    <div
        class="bg-surface-50 dark:bg-surface-950 flex items-center justify-center min-h-screen min-w-[100vw] overflow-hidden py-8">
        <div class="justify-center w-full max-w-5xl mx-auto px-4">
            <div style="border-radius: 56px; padding: 0.3rem; background: linear-gradient(180deg, var(--primary-color) 10%, rgba(33, 150, 243, 0) 30%)"
                class="w-full">
                <div class="w-full bg-surface-0 dark:bg-surface-900 py-12 px-8 sm:px-16" style="border-radius: 53px">

                    <!-- Título -->
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-surface-900 dark:text-surface-0 mb-2">
                            Crear Cuenta
                        </h1>
                        <p>
                            Comienza hacer crecer tu dinero!
                        </p>
                    </div>

                    <!-- Selector de Perfil -->
                    <div class="mb-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <Card
                                :class="['cursor-pointer transition-all border-2', selectedProfile === 'investor' ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20' : 'border-surface-200 dark:border-surface-700 hover:border-primary-300']"
                                @click="switchProfile('investor')">
                                <template #content>
                                    <div class="flex items-center justify-center p-4">
                                        <RadioButton v-model="selectedProfile" inputId="investor" name="profile"
                                            value="investor" class="mr-3" />
                                        <div class="text-center">
                                            <i class="pi pi-user text-2xl text-primary-500 mb-2 block"></i>
                                            <label for="investor"
                                                class="font-semibold text-surface-900 dark:text-surface-0 cursor-pointer">
                                                Perfil Inversionista
                                            </label>
                                        </div>
                                    </div>
                                </template>
                            </Card>

                            <Card
                                :class="['cursor-pointer transition-all border-2', selectedProfile === 'company' ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20' : 'border-surface-200 dark:border-surface-700 hover:border-primary-300']"
                                @click="switchProfile('company')">
                                <template #content>
                                    <div class="flex items-center justify-center p-4">
                                        <RadioButton v-model="selectedProfile" inputId="company" name="profile"
                                            value="company" class="mr-3" />
                                        <div class="text-center">
                                            <i class="pi pi-building text-2xl text-primary-500 mb-2 block"></i>
                                            <label for="company"
                                                class="font-semibold text-surface-900 dark:text-surface-0 cursor-pointer">
                                                Perfil Empresa
                                            </label>
                                        </div>
                                    </div>
                                </template>
                            </Card>
                        </div>
                    </div>

                    <!-- Formulario solo para inversionistas -->
                    <div v-if="selectedProfile === 'investor'">
                        <form @submit.prevent="submit" class="space-y-6">
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <!-- Número de documento -->
                                    <div class="flex flex-col">
                                        <label class="font-bold mb-2">Número de documento <span class="text-red-500">*</span></label>
                                        <InputText type="text" v-model="form.document_number" 
                                                   :class="{ 'p-invalid': form.errors.document_number }" />
                                        <InlineMessage v-if="form.errors.document_number" class="mt-1">
                                            {{ form.errors.document_number }}
                                        </InlineMessage>
                                    </div>

                                    <!-- Nombres -->
                                    <div class="flex flex-col">
                                        <label class="font-bold mb-2">Nombres <span class="text-red-500">*</span></label>
                                        <InputText type="text" v-model="form.first_name" 
                                                   :class="{ 'p-invalid': form.errors.first_name }" />
                                        <InlineMessage v-if="form.errors.first_name" class="mt-1">
                                            {{ form.errors.first_name }}
                                        </InlineMessage>
                                    </div>

                                    <!-- Apellido paterno -->
                                    <div class="flex flex-col">
                                        <label class="font-bold mb-2">Apellido Paterno <span class="text-red-500">*</span></label>
                                        <InputText type="text" v-model="form.paternal_surname" 
                                                   :class="{ 'p-invalid': form.errors.paternal_surname }" />
                                        <InlineMessage v-if="form.errors.paternal_surname" class="mt-1">
                                            {{ form.errors.paternal_surname }}
                                        </InlineMessage>
                                    </div>

                                    <!-- Apellido materno -->
                                    <div class="flex flex-col">
                                        <label class="font-bold mb-2">Apellido Materno <span class="text-red-500">*</span></label>
                                        <InputText type="text" v-model="form.maternal_surname" 
                                                   :class="{ 'p-invalid': form.errors.maternal_surname }" />
                                        <InlineMessage v-if="form.errors.maternal_surname" class="mt-1">
                                            {{ form.errors.maternal_surname }}
                                        </InlineMessage>
                                    </div>

                                    <!-- Alias -->
                                    <div class="flex flex-col">
                                        <label class="font-bold mb-2">Alias <span class="text-red-500">*</span></label>
                                        <InputText type="text" v-model="form.alias" 
                                                   :class="{ 'p-invalid': form.errors.alias }" />
                                        <InlineMessage v-if="form.errors.alias" class="mt-1">
                                            {{ form.errors.alias }}
                                        </InlineMessage>
                                    </div>

                                    <!-- Teléfono -->
                                    <div class="flex flex-col">
                                        <label class="font-bold mb-2">Número de teléfono <span class="text-red-500">*</span></label>
                                        <InputText type="text" v-model="form.phone" 
                                                   :class="{ 'p-invalid': form.errors.phone }" />
                                        <InlineMessage v-if="form.errors.phone" class="mt-1">
                                            {{ form.errors.phone }}
                                        </InlineMessage>
                                    </div>

                                    <!-- Correo electrónico (una sola caja) -->
                                    <div class="flex flex-col md:col-span-2">
                                        <label class="font-bold mb-2">Correo electrónico <span class="text-red-500">*</span></label>
                                        <InputText type="email" v-model="form.email" 
                                                   :class="{ 'p-invalid': form.errors.email }" />
                                        <InlineMessage v-if="form.errors.email" class="mt-1">
                                            {{ form.errors.email }}
                                        </InlineMessage>
                                    </div>

                                    <!-- Contraseña -->
                                    <div class="flex flex-col">
                                        <label class="font-bold mb-2">Contraseña <span class="text-red-500">*</span></label>
                                        <Password v-model="form.password" 
                                                  :class="{ 'p-invalid': form.errors.password }" 
                                                  toggleMask 
                                                  :feedback="false" />
                                        <InlineMessage v-if="form.errors.password" class="mt-1">
                                            {{ form.errors.password }}
                                        </InlineMessage>
                                        <!-- Validación visual de contraseña -->
                                        <div v-if="form.password" class="mt-2 text-sm">
                                            <div :class="passwordValidation.hasMinLength ? 'text-green-600' : 'text-red-600'">
                                                • Mínimo 6 caracteres
                                            </div>
                                            <div :class="passwordValidation.hasUppercase ? 'text-green-600' : 'text-red-600'">
                                                • Al menos una mayúscula
                                            </div>
                                            <div :class="passwordValidation.hasNumber ? 'text-green-600' : 'text-red-600'">
                                                • Al menos un número
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Confirmar contraseña -->
                                    <div class="flex flex-col">
                                        <label class="font-bold mb-2">Confirmar contraseña <span class="text-red-500">*</span></label>
                                        <Password v-model="form.password_confirmation" 
                                                  :class="{ 'p-invalid': form.errors.password_confirmation || (form.password_confirmation && !passwordsMatch) }" 
                                                  toggleMask 
                                                  :feedback="false" />
                                        <InlineMessage v-if="form.errors.password_confirmation" class="mt-1">
                                            {{ form.errors.password_confirmation }}
                                        </InlineMessage>
                                        <InlineMessage v-else-if="form.password_confirmation && !passwordsMatch" 
                                                       severity="error" class="mt-1">
                                            Las contraseñas no coinciden
                                        </InlineMessage>
                                        <InlineMessage v-else-if="form.password_confirmation && passwordsMatch" 
                                                       severity="success" class="mt-1">
                                            Las contraseñas coinciden
                                        </InlineMessage>
                                    </div>
                                </div>
                            </div>

                            <!-- Términos y Condiciones -->
                            <div class="field">
                                <div class="flex items-start space-x-3">
                                    <Checkbox id="accept_terms" v-model="acceptTerms" :binary="true"
                                        :class="{ 'p-invalid': form.errors.accept_terms }" required />
                                    <label for="accept_terms"
                                        class="text-sm text-surface-700 dark:text-surface-300 cursor-pointer">
                                        Acepto los
                                        <a href="#" class="text-primary-500 hover:text-primary-600 font-medium">
                                            Términos y Condiciones
                                        </a>
                                        y las
                                        <a href="#" class="text-primary-500 hover:text-primary-600 font-medium">
                                            Políticas de Privacidad
                                        </a> *
                                    </label>
                                </div>
                                <InlineMessage v-if="form.errors.accept_terms" class="mt-1">{{ form.errors.accept_terms }}
                                </InlineMessage>
                            </div>

                            <!-- Mensaje de estado -->
                            <Message v-if="status" :severity="status === 'success' ? 'success' : 'error'" :closable="false">
                                {{ status }}
                            </Message>

                            <!-- Botón de registro -->
                            <div class="pt-4">
                                <Button type="submit" label="Registrarme" class="w-full p-3 text-lg font-semibold"
                                    :loading="form.processing"
                                    :disabled="!acceptTerms || !passwordValidation.isValid || !passwordsMatch" />
                            </div>

                            <!-- Link para iniciar sesión -->
                            <div class="text-center pt-4">
                                <p class="text-surface-600 dark:text-surface-400">
                                    ¿Ya tienes cuenta?
                                    <Link href="/login"
                                        class="text-primary-500 hover:text-primary-600 font-medium ml-1 transition-colors">
                                    Iniciar Sesión
                                    </Link>
                                </p>
                            </div>
                        </form>
                    </div>

                    <!-- Mensaje para empresas -->
                    <div v-else class="text-center py-12">
                        <div class="max-w-md mx-auto">
                            <i class="pi pi-building text-6xl text-primary-500 mb-6 block"></i>
                            <h3 class="text-2xl font-bold text-surface-900 dark:text-surface-0 mb-4">
                                Perfil Empresa
                            </h3>
                            <p class="text-surface-600 dark:text-surface-400 mb-6">
                                Para empresas, contáctanos directamente y uno de nuestros asesores especializados te ayudará con el proceso de registro.
                            </p>
                            <div class="space-y-3">
                                <p class="text-surface-700 dark:text-surface-300">
                                    <i class="pi pi-phone mr-2"></i>
                                    <strong>Teléfono:</strong> +51 XXX XXX XXX
                                </p>
                                <p class="text-surface-700 dark:text-surface-300">
                                    <i class="pi pi-envelope mr-2"></i>
                                    <strong>Email:</strong> empresas@tudominio.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
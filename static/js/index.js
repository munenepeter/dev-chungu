const {
    createApp,
    ref
} = Vue

const getQouteForm = createApp({
    setup() {
        const form = ref({
            full_name: "",
            user_email: "",
            project_title: "",
            project_type: "",
            project_description: "",
        });

        const errors = ref({});
        const success = ref(false);
        const loading = ref(false);

        const submitForm = () => {
            loading.value = true;
            errors.value = {};
            const formData = new FormData();

            formData.append('name', form.value.full_name);
            formData.append('email', form.value.user_email);
            formData.append('project_title', form.value.project_title);
            formData.append('project_type', form.value.project_type);
            formData.append('project_description', form.value.project_description);


            axios
                .post('index/intent/sendqoute', formData)
                .then(response => {
                    errors.value = response.data.errors;
                    success.value = response.data.success;
                    loading.value = false;

                    setTimeout(() => {
                        const closeModalButton = document.getElementById('closeQouteModal');
                        if (closeModalButton) {
                            closeModalButton.click();
                            
                        }
                    }, 3000);
                })
                .catch(error => {
                    loading.value = false;
                    console.error('Error:', error);
                }).finally(() => {
                    loading.value = false;
                });
        };

        return {
            form,
            errors,
            success,
            loading,
            submitForm,
        }
    },
}).mount('#getQouteModal');
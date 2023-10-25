const {
    createApp,
    ref
} = Vue

const getQouteForm = createApp({
    setup() {
        const form = ref({
            name: "",
            email: "",
            project_title: "",
            project_type: "Select type of project",
            project_description: "",
        });

        const errors = ref({});
        const success = ref(false);

        const submitForm = () => {
            // Clear previous errors
            errors.value = {};


            const formData = new FormData();

            // Append each form field to the FormData object
            formData.append('name', form.value.name);
            formData.append('email', form.value.email);
            formData.append('project_title', form.value.project_title);
            formData.append('project_type', form.value.project_type);
            formData.append('project_description', form.value.project_description);

            // Simulate a server request
            axios
                .post('index/intent/sendqoute', formData)
                .then(response => {
                    // Assuming the server responds with validation errors and success status
                    errors.value = response.data.errors;
                    success.value = response.data.success;
                    console.log(response);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        };

        return {
            form,
            errors,
            success,
            submitForm,
        }
    },
}).mount('#getQouteModal');
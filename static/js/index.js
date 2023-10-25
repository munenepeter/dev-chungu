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

            // Simulate a server request
           axios
               .post('index/intent/sendqoute', form)
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




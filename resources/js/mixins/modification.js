export default {
  data () {
    return {

    }
  },

  methods: {
    destroy() {
      this.toast.question('Are you sure about that?', 'Confirm', {
        timeout: 20000,
        close: false,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        title: 'Hey',
        position: 'center',
        buttons: [
          ['<button><b>YES</b></button>', (instance, toast) => {
            axios.delete(this.endpoint)
            .then(res => {
              $(this.$el).fadeOut(500, () => {
                this.$toast.success(res.data.message, 'Success', { timeout: 3000});
              });
            });
            instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

          }, true],
          ['<button>NO</button>', function (instance, toast) {

            instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

          }],
        ],
      });
    },
  }
}
<script>
export default {
  props: ['answer'],

  data() {
    return {
      editing: false,
      body: this.answer.body,
      bodyHtml: this.answer.bodyHtml,
      id: this.answer.id,
      questionId: this.answer.question_id,
      beforeEditCache: null
    }
  },

  methods: {
    edit () {
      this.beforeEditCache = this.body;
      this.editing = true;
    },

    cancel() {
      this.body = this.beforeEditCache;
      this.editing = false;
    },

    update () {
      axios.patch(`/questions/${this.questionId}/answers/${this.id} `, {
        body: this.body
      })
      .then(res => {
        this.editing = false;
        this.bodyHtml = res.data.body_html;
        alert(res.data.message);
      })
      .catch(err => {
        alert(err.response.data.message);
        console.log('Someting went wrong');
      });
    }
  },

  computed: {
    isInvalid () {
      return this.body.length < 5;
    }
  }
};
</script>
export default {
  methods: {
    formGetValues(fields) {
      const obj = {}
      if (!fields) {
        this.fields.forEach(field => {
          obj[field.name] = field.value
        })
      }
      return obj
    },
  
    formClearValues() {
      this.fields.forEach(field => field.value = "")
    },

    formGetFieldTag(obj) {
			if (obj.hasOwnProperty('rows')) return 'textarea'
			if (obj.hasOwnProperty('mask')) return 'the-mask'
			return 'input'
		}
  }
}
export default (context, inject) => {
  const formatDate = (date) => {
    return context.$moment(date).format('MMMM DD, YYYY')
  }
  inject('formatDate', formatDate)
}

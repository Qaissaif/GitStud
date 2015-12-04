
ready = ->
  window.myCustomConfirmBox = (message,callback) ->
    bootbox.dialog
      message: message
      class: 'class-confirm-box'
      className: "my-modal"
      buttons:
        chickenout:
          label: "Cancel"
          className: "btn-ok"
        success:
          label: "Yes"
          className: "btn-danger"
          callback: -> callback()


  $.rails.allowAction = (element) ->
    message = element.data("confirm")
    return true  unless message

    answer = false
    callback = undefined

    if $.rails.fire(element, "confirm")
      myCustomConfirmBox message, ->
        callback = $.rails.fire(element, "confirm:complete", [answer])
        if callback
          oldAllowAction = $.rails.allowAction
          $.rails.allowAction = ->
            true

          element.trigger "click"
          $.rails.allowAction = oldAllowAction

    false


$(document).ready(ready)
$(document).on('page:load', ready)
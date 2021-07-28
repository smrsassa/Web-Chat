const elemChatArea = $(".chat-area"),
      elemConversa = $(".conversa")


elemConversa.on("click", (event) => {
    event.preventDefault()

    let userId = event.target.id

    $.get( "chat", { id: userId } )
        .done(function( data ) {
            elemChatArea.html(data)
        })
})

const options = $(".options"),
      optionsDropdown = $(".optionsDropdown")


optionsDropdown.hide()

options.on("click", () => {
    if ( optionsDropdown.is(":hidden") ) {
        return optionsDropdown.show()
    }
    optionsDropdown.hide()
})

const options = $(".options"),
      optionsDropdown = $(".optionsDropdown")


optionsDropdown.hide()

options.on("click", () => {
    if ( optionsDropdown.is(":hidden") ) {
        return optionsDropdown.show()
    }
    optionsDropdown.hide()
})

var SlugCreator = {
    init: function() {
        this.strToSlug();
    },

    title: "",
    slug: "",

    strToSlug: function() {
        SlugCreator.title.addEventListener("keyup", function() {
            var Text = SlugCreator.title.value;
            Text = SlugCreator.removeAccents(Text);
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, "-");
            SlugCreator.slug.value = Text;
        });
    },

    removeAccents: function(title) {
        var str = title.split(""),
            strOut = [],
            strLen = title.length,
            accents =
                "ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž",
            accentsOut =
                "AAAAAAaaaaaaOOOOOOOooooooEEEEeeeeeCcDIIIIiiiiUUUUuuuuNnSsYyyZz";
        for (var y = 0; y < strLen; y++) {
            if (accents.indexOf(str[y]) !== -1) {
                strOut[y] = accentsOut.substr(accents.indexOf(str[y]), 1);
            } else strOut[y] = str[y];
        }
        strOut = strOut.join("");
        return strOut;
    }
};

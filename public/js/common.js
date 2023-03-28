const Common = {
    getFileNameFromURL : function (url, useExtension = true) {
        const parts = url.split('/');
        if (useExtension) {
            return parts[parts.length - 1];
        }
        return parts[parts.length - 1].replace(/\.[^/.]+$/, "");
    },

    makeId: function (length = 10) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < length) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
          counter += 1;
        }
        return result;
    }
}
const ContractSetting = {
    itemSelected: -1,

    addNewContractItem: function (contractItem) {
        const contractItemElm = $(contractItem);

        contractItemElm.attr('data-id', Common.makeId());

        contractItemElm.find('.contract-remove-item-btn').off('click').on('click', function () {
            contractItemElm.remove();
        })

        contractItemElm.find('.contract-choose-icon').off('click').on('click', function () {
            ContractSetting.itemSelected = contractItemElm.attr('data-id');
            ContractSetting.showContractIconModal();
        })

        contractItemElm.find('.contract-icon-remove').off('click').on('click', function () {
            ContractSetting.removeContractIcon($(this))
        })

        contractItemElm.find('.contract-icon-remove').attr('src', `${baseUrl}icons/trashed.svg`)

        $('.contract__list').prepend(contractItemElm);
    },

    showContractIconModal: async function () {
        try {
            let res = await axios.get(listIconsURL);
            if (res.status == false) {
                $('#choose-icon-modal .modal-body').text(res.errorMessage);
                $('#choose-icon-modal').modal('show')
                return;
            }
            
            let listIconElm = '';
            res.data.forEach(iconObj => {
                listIconElm += `<div class="choose-icon-item pointer d-flex flex-column align-items-center m-2 p-1" data-path="${iconObj.path}" data-url="${iconObj.url}">
                    <img src="${iconObj.url}" height="50">
                    <p class="mt-2 break-word">${Common.getFileNameFromURL(iconObj.url, false)}</p>
                </div>`;
            });
            $('#choose-icon-modal .modal-body').html(listIconElm);

            // add event for icon item
            $('#choose-icon-modal .modal-body .choose-icon-item').each(function() {
                $(this).off('click').on('click', function () {
                    $('#choose-icon-modal .choose-icon-item.active').removeClass('active');
                    $(this).addClass('active');
                })
            })

            //add event for button save
            $('#choose-icon-modal .choose-icon-save-btn').off('click').on('click', function () {
                const activeIcon = $('#choose-icon-modal .choose-icon-item.active');
                if (activeIcon.length == 0) {
                    $('#choose-icon-modal').modal('hide');
                    return;
                } 
                const iconPath = activeIcon.attr('data-path');
                const iconUrl = activeIcon.attr('data-url');

                ContractSetting.showContractIconPreview(iconPath, iconUrl)

                $('#choose-icon-modal').modal('hide');
            })

            $('#choose-icon-modal').modal('show')
        } catch (error) {
            console.log(error)
        }
    },

    showContractIconPreview (iconPath, iconUrl) {
        const selectedItem = $(`.contract-item[data-id="${ContractSetting.itemSelected}"]`);
        selectedItem.find('.icon-path').val(iconPath);
        selectedItem.find('.contract-icon-preview').attr('src', iconUrl);
        selectedItem.find('.contract-icon-preview').attr('hidden', false);
        selectedItem.find('.contract-choose-icon').attr('hidden', true);
    },

    removeContractIcon (removeIconElm) {
        removeIconElm.siblings('.icon-path').val('');
        removeIconElm.siblings('.contract-icon-preview').attr('hidden', true);
        removeIconElm.siblings('.contract-choose-icon').attr('hidden', false);
    }
}
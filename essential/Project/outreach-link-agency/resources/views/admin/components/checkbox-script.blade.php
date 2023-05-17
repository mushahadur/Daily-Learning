
<script>
		$("#customCheckAll").click(function(){

			if($(this).is(":checked")){
				$('input[type=checkbox]').prop('checked', true);
			}
			else{
				$('input[type=checkbox]').prop('checked', false);
			}

		})

		function checkPermissionByGroup(className, checkThis){
			const groupIdName = $("#"+checkThis.id);
			const classCheckBox = $('.'+className+' input');

			if(groupIdName.is(':checked')){
				classCheckBox.prop('checked', true);
			}
			else{
				classCheckBox.prop('checked', false);
			}

			implementAllChecked();
		}

		function checkSinglePermission(groupClassName, groupID, countTotalPermission){
			const classCheckbox = $('.'+groupClassName+ ' input');
			const groupIDCheckBox = $("#"+groupID);

			if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
				groupIDCheckBox.prop('checked', true);
			}
			else{
				groupIDCheckBox.prop('checked', false);
			}

			implementAllChecked();
		}

		function implementAllChecked() {
             const countPermissions = {{ count($permissionsAll) }};
             const countPermissionGroups = {{ count($permissionsGroup) }};

             if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
                $("#customCheckAll").prop('checked', true);
            }else{
                $("#customCheckAll").prop('checked', false);
            }
		}

	</script>
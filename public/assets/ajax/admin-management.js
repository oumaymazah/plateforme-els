// class AdminManager {
//     constructor() {
//       this.init();
//     }

//     init() {
//       this.bindEvents();
//       this.loadUsers(); // Load users by default
//     }

//     bindEvents() {
//       // Navigation
//       $(document)
//         .on('click', '#load-users', () => this.loadUsers())
//         .on('click', '#load-roles', () => this.loadRoles())
//         .on('click', '#load-permission', () => this.loadPermissions())
//         .on('click', '#loadCreateUserForm', () => this.loadCreateUserForm())
//         .on('click', '#loadCreateRoleForm', () => this.loadCreateRoleForm())
//         .on('click', '#loadCreatePermissionForm', () => this.loadCreatePermissionForm());

//       // Forms
//       $(document)
//         .on('submit', '#create-user-form', (e) => this.handleUserForm(e))
//         .on('submit', '#edit-role-form', (e) => this.handleRoleForm(e))
//         .on('submit', '#create-role-form', (e) => this.handleRoleForm(e))
//         .on('submit', '#create-permission-form', (e) => this.handlePermissionForm(e))
//         .on('submit', '#edit-permission-form', (e) => this.handlePermissionForm(e));

//       // Actions
//       $(document)
//         .on('click', '.delete-user', (e) => this.deleteItem(e, 'users'))
//         .on('click', '.delete-role', (e) => this.deleteItem(e, 'roles'))
//         .on('click', '.delete-permission', (e) => this.deleteItem(e, 'permissions'))
//         .on('change', '.toggle-status-switch', (e) => this.toggleUserStatus(e))
//         .on('click', '.toggle-status-menu', (e) => this.toggleUserStatusMenu(e))
//         .on('click', '.view-user-roles', (e) => this.viewUserRoles(e))
//         .on('click', '.remove-role', (e) => this.removeRoleFromUser(e))
//         .on('click', '.revoke-permission', (e) => this.revokePermissionFromUser(e))
//         .on('change', '#role-filter, #status-filter', () => this.applyFilters())
//         .on('click', '.edit-role', (e) => this.loadEditRoleForm(e))
//         .on('click', '.edit-permission', (e) => this.loadEditPermissionForm(e));
//     }

//     // View loading methods
//     loadUsers() {
//       this.showLoader();
//       $.ajax({
//         url: $('#load-users').data('user-url'),
//         type: 'GET',
//         success: (response) => {
//           $('#blog-container').html(response);
//           this.initDataTable('#users-table');
//           this.initSelect2();
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     loadRoles() {
//       this.showLoader();
//       $.ajax({
//         url: $('#load-roles').data('roles-url'),
//         type: 'GET',
//         success: (response) => {
//           $('#blog-container').html(response);
//           this.initDataTable('#roles-table');
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     loadPermissions() {
//       this.showLoader();
//       $.ajax({
//         url: $('#load-permission').data('permission-url'),
//         type: 'GET',
//         success: (response) => {
//           $('#blog-container').html(response);
//           this.initDataTable('#permissions-table');
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     // Form loading methods
//     loadCreateUserForm() {
//       this.showLoader();
//       $.ajax({
//         url: $('#loadCreateUserForm').data('create-url'),
//         type: 'GET',
//         success: (response) => {
//           $('#exampleModal .modal-body').html(response);
//           this.initSelect2();
//           $('#exampleModalLabel').text('Créer un utilisateur');
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     loadCreateRoleForm() {
//       this.showLoader();
//       $.ajax({
//         url: $('#loadCreateRoleForm').data('create-url'),
//         type: 'GET',
//         success: (response) => {
//           $('#exampleModal .modal-body').html(response);
//           $('#exampleModalLabel').text('Créer un rôle');
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     loadCreatePermissionForm() {
//       this.showLoader();
//       $.ajax({
//         url: $('#loadCreatePermissionForm').data('create-url'),
//         type: 'GET',
//         success: (response) => {
//           $('#exampleModal .modal-body').html(response);
//           $('#exampleModalLabel').text('Créer une permission');
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     loadEditRoleForm(e) {
//       e.preventDefault();
//       const url = $(e.currentTarget).data('url');
//       this.showLoader();
//       $.ajax({
//         url: url,
//         type: 'GET',
//         success: (response) => {
//           $('#blog-container').html(response);
//           this.initSelect2();
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     loadEditPermissionForm(e) {
//       e.preventDefault();
//       const url = $(e.currentTarget).data('url');
//       this.showLoader();
//       $.ajax({
//         url: url,
//         type: 'GET',
//         success: (response) => {
//           $('#blog-container').html(response);
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     // Form handlers
//     handleUserForm(e) {
//       e.preventDefault();
//       const form = $(e.target);
//       this.submitForm(form, () => {
//         $('#exampleModal').modal('hide');
//         this.loadUsers();
//       });
//     }

//     handleRoleForm(e) {
//       e.preventDefault();
//       const form = $(e.target);
//       this.submitForm(form, () => {
//         $('#exampleModal').modal('hide');
//         this.loadRoles();
//       });
//     }

//     handlePermissionForm(e) {
//       e.preventDefault();
//       const form = $(e.target);
//       this.submitForm(form, () => {
//         $('#exampleModal').modal('hide');
//         this.loadPermissions();
//       });
//     }

//     submitForm(form, successCallback) {
//       this.showLoader();
//       $.ajax({
//         url: form.attr('action'),
//         type: form.attr('method'),
//         data: form.serialize(),
//         success: (response) => {
//           if (response.success) {
//             this.showAlert('success', response.message);
//             if (typeof successCallback === 'function') {
//               successCallback();
//             }
//           } else if (response.errors) {
//             this.displayFormErrors(form, response.errors);
//           }
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     // Action handlers
//     deleteItem(e, type) {
//       e.preventDefault();
//       const url = $(e.currentTarget).data('url');
//       this.confirmDelete(() => {
//         this.showLoader();
//         $.ajax({
//           url: url,
//           type: 'DELETE',
//           headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ajout de CSRF token
//           },
//           success: (response) => {
//             this.showAlert('success', response.success);
//             this[`load${type.charAt(0).toUpperCase() + type.slice(1)}`]();
//           },
//           error: (xhr) => this.handleError(xhr)
//         });
//       });
//     }

//     // Toggle status methods - Version consolidée
//     toggleUserStatus(e) {
//       const switchElement = $(e.currentTarget);
//       const url = switchElement.data('url');
//       const isChecked = switchElement.is(':checked');
//       const status = isChecked ? 'active' : 'inactive';

//       this.showLoader();
//       $.ajax({
//         url: url,
//         type: 'PATCH',
//         data: { status: status },
//         headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ajout de CSRF token
//         },
//         success: (response) => {
//           this.showAlert('success', response.message);
//           switchElement.next('label').text(response.status === 'active' ? 'Actif' : 'Inactif');
//           this.loadUsers();
//         },
//         error: (xhr) => {
//           switchElement.prop('checked', !isChecked);
//           this.handleError(xhr);
//         }
//       });
//     }

//     toggleUserStatusMenu(e) {
//       e.preventDefault();
//       const link = $(e.currentTarget);
//       const url = link.data('url');
//       const currentStatus = link.data('status');
//       const newStatus = currentStatus === 'active' ? 'inactive' : 'active';

//       this.showLoader();
//       $.ajax({
//         url: url,
//         type: 'PATCH',
//         data: { status: newStatus },
//         headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ajout de CSRF token
//         },
//         success: (response) => {
//           this.showAlert('success', response.message);
//           this.loadUsers();
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     viewUserRoles(e) {
//       e.preventDefault();
//       const url = $(e.currentTarget).data('url');
//       this.showLoader();
//       $.ajax({
//         url: url,
//         type: 'GET',
//         success: (response) => {
//           $('#blog-container').html(response);
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     removeRoleFromUser(e) {
//       e.preventDefault();
//       const url = $(e.currentTarget).data('url');
//       this.showLoader();
//       $.ajax({
//         url: url,
//         type: 'DELETE',
//         headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ajout de CSRF token
//         },
//         success: (response) => {
//           this.showAlert('success', response.message);
//           this.loadUsers();
//         },
//         error: (xhr) => this.handleError(xhr)
//       });
//     }

//     // revokePermissionFromUser(e) {
//     //   e.preventDefault();
//     //   const url = $(e.currentTarget).data('url');
//     //   this.showLoader();
//     //   $.ajax({
//     //     url: url,
//     //     type: 'DELETE',
//     //     headers: {
//     //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ajout de CSRF token
//     //     },
//     //     success: (response) => {
//     //       this.showAlert('success', response.message);
//     //       this.loadUsers();
//     //     },
//     //     error: (xhr) => this.handleError(xhr)
//     //   });
//     // }

//     revokePermissionFromUser(e) {
//         e.preventDefault();
//         const url = $(e.currentTarget).data('url');
//         const listItem = $(e.currentTarget).closest('li'); // Stocke l'élément à supprimer

//         this.confirmDelete(() => {
//             this.showLoader();
//             $.ajax({
//                 url: url,
//                 type: 'DELETE',
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 },
//                 success: (response) => {
//                     if (response.success) {
//                         // Supprime visuellement l'élément immédiatement
//                         listItem.remove();
//                         this.showAlert('success', response.message);

//                         // Recharge seulement si plus d'éléments
//                         if ($('#roles_Permission .list-group-item').length === 0) {
//                             this.viewUserRoles(e); // Recharge la vue complète
//                         }
//                     } else {
//                         this.showAlert('warning', response.message);
//                     }
//                 },
//                 error: (xhr) => this.handleError(xhr)
//             });
//         });
//     }

//     applyFilters() {
//         const role = $('#role-filter').val();
//         const status = $('#status-filter').val();

//         console.log('Applying filters:', { role, status });

//         this.showLoader();
//         $.ajax({
//           url: $('#load-users').data('user-url'),
//           type: 'GET',
//           data: {
//             role: role,
//             status: status
//           },
//           success: (response) => {
//             $('#blog-container').html(response);
//             this.initDataTable('#users-table');
//             this.initSelect2();

//             // Restaurer les valeurs des filtres après le rechargement
//             if (role) $('#role-filter').val(role);
//             if (status) $('#status-filter').val(status);
//           },
//           error: (xhr) => this.handleError(xhr)
//         });
//     }

//     // Utility methods
//     confirmDelete(callback) {
//       Swal.fire({
//         title: 'Êtes-vous sûr?',
//         text: "Cette action est irréversible!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Oui, supprimer!'
//       }).then((result) => {
//         if (result.isConfirmed) {
//           callback();
//         }
//       });
//     }

//     showLoader() {
//       $('#blog-container').html('<div class="text-center py-5"><div class="spinner-border text-primary" role="status"><span class="sr-only">Chargement...</span></div></div>');
//     }

//     showAlert(type, message) {
//       const alert = $(`
//         <div class="alert alert-${type} alert-dismissible fade show" role="alert">
//           ${message}
//           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//         </div>
//       `);
//       $('#alert-container').html(alert);
//       setTimeout(() => alert.alert('close'), 5000);
//     }

//     handleError(xhr) {
//       let message = 'Une erreur est survenue';
//       if (xhr.responseJSON && xhr.responseJSON.message) {
//         message = xhr.responseJSON.message;
//       }
//       this.showAlert('danger', message);
//     }

//     displayFormErrors(form, errors) {
//       form.find('.is-invalid').removeClass('is-invalid');
//       form.find('.invalid-feedback').remove();

//       $.each(errors, (field, messages) => {
//         const input = form.find(`[name="${field}"]`);
//         input.addClass('is-invalid');
//         input.after(`<div class="invalid-feedback">${messages.join('<br>')}</div>`);
//       });
//     }

//     initDataTable(selector) {
//       if ($.fn.DataTable.isDataTable(selector)) {
//         $(selector).DataTable().destroy();
//       }
//       $(selector).DataTable({
//         responsive: true,
//         language: {
//           url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json'
//         },
//         pageLength: 10
//       });
//     }

//     initSelect2() {
//       $('.select2').select2({
//         dropdownParent: $('#exampleModal'),
//         width: '100%'
//       });
//     }
//   }

//   // Initialize when document is ready
//   $(document).ready(() => new AdminManager());



class AdminManager {
    constructor() {
      this.init();
    }

    init() {
      this.bindEvents();
      this.loadUsers(); // Load users by default
    }

    bindEvents() {
      // Navigation
      $(document)
        .on('click', '#load-users', () => this.loadUsers())
        .on('click', '#load-roles', () => this.loadRoles())
        .on('click', '#load-permission', () => this.loadPermissions())
        .on('click', '#loadCreateUserForm', () => this.loadCreateUserForm())
        .on('click', '#loadCreateRoleForm', () => this.loadCreateRoleForm())
        .on('click', '#loadCreatePermissionForm', () => this.loadCreatePermissionForm())
        .on('click', '.back-btn', (e) => this.handleBackButton(e));

      // Forms
      $(document)
        .on('submit', '#create-user-form', (e) => this.handleUserForm(e))
        .on('submit', '#edit-role-form', (e) => this.handleRoleForm(e))
        .on('submit', '#create-role-form', (e) => this.handleRoleForm(e))
        .on('submit', '#create-permission-form', (e) => this.handlePermissionForm(e))
        .on('submit', '#edit-permission-form', (e) => this.handlePermissionForm(e));

      // Actions
      $(document)
        .on('click', '.delete-user', (e) => this.deleteItem(e, 'users'))
        .on('click', '.delete-role', (e) => this.deleteItem(e, 'roles'))
        .on('click', '.delete-permission', (e) => this.deleteItem(e, 'permissions'))
        .on('change', '.toggle-status-switch', (e) => this.toggleUserStatus(e))
        .on('click', '.toggle-status-menu', (e) => this.toggleUserStatusMenu(e))
        .on('click', '.view-user-roles', (e) => this.viewUserRoles(e))
        .on('click', '.remove-role', (e) => this.removeRoleFromUser(e))  // Handler pour supprimer un rôle
        .on('click', '.revoke-permission', (e) => this.revokePermissionFromUser(e))  // Handler pour révoquer une permission
        .on('change', '#role-filter, #status-filter', () => this.applyFilters())
        .on('click', '.edit-role', (e) => this.loadEditRoleForm(e))
        .on('click', '.edit-permission', (e) => this.loadEditPermissionForm(e));

      // Ajouter du débogage pour vérifier que les événements sont liés
      console.log('AdminManager: Events bound successfully');
    }

    // Méthode pour gérer le bouton retour
    handleBackButton(e) {
        e.preventDefault();
        const targetTab = $(e.currentTarget).data('back-tab');
        console.log("Handling back button with target:", targetTab);

        if (targetTab === 'users') {
            this.loadUsers();
        } else if (targetTab === 'roles') {
            this.loadRoles();
        } else if (targetTab === 'permissions') {
            this.loadPermissions();
        }
    }

    // View loading methods
    loadUsers() {
      this.showLoader();
      console.log("Loading users view");

      $.ajax({
        url: $('#load-users').data('user-url'),
        type: 'GET',
        success: (response) => {
          $('#blog-container').html(response);
          this.initDataTable('#users-table');
          this.initSelect2();
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    loadRoles() {
      this.showLoader();
      $.ajax({
        url: $('#load-roles').data('roles-url'),
        type: 'GET',
        success: (response) => {
          $('#blog-container').html(response);
          this.initDataTable('#roles-table');
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    loadPermissions() {
      this.showLoader();
      $.ajax({
        url: $('#load-permission').data('permission-url'),
        type: 'GET',
        success: (response) => {
          $('#blog-container').html(response);
          this.initDataTable('#permissions-table');
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    // Form loading methods
    loadCreateUserForm() {
      this.showLoader();
      $.ajax({
        url: $('#loadCreateUserForm').data('create-url'),
        type: 'GET',
        success: (response) => {
          $('#exampleModal .modal-body').html(response);
          this.initSelect2();
          $('#exampleModalLabel').text('Créer un utilisateur');
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    loadCreateRoleForm() {
      this.showLoader();
      $.ajax({
        url: $('#loadCreateRoleForm').data('create-url'),
        type: 'GET',
        success: (response) => {
          $('#exampleModal .modal-body').html(response);
          $('#exampleModalLabel').text('Créer un rôle');
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    loadCreatePermissionForm() {
      this.showLoader();
      $.ajax({
        url: $('#loadCreatePermissionForm').data('create-url'),
        type: 'GET',
        success: (response) => {
          $('#exampleModal .modal-body').html(response);
          $('#exampleModalLabel').text('Créer une permission');
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    loadEditRoleForm(e) {
      e.preventDefault();
      const url = $(e.currentTarget).data('url');
      this.showLoader();
      $.ajax({
        url: url,
        type: 'GET',
        success: (response) => {
          $('#blog-container').html(response);
          this.initSelect2();
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    loadEditPermissionForm(e) {
      e.preventDefault();
      const url = $(e.currentTarget).data('url');
      this.showLoader();
      $.ajax({
        url: url,
        type: 'GET',
        success: (response) => {
          $('#blog-container').html(response);
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    // Form handlers
    handleUserForm(e) {
      e.preventDefault();
      const form = $(e.target);
      this.submitForm(form, () => {
        $('#exampleModal').modal('hide');
        this.loadUsers();
      });
    }

    handleRoleForm(e) {
      e.preventDefault();
      const form = $(e.target);
      this.submitForm(form, () => {
        $('#exampleModal').modal('hide');
        this.loadRoles();
      });
    }

    handlePermissionForm(e) {
      e.preventDefault();
      const form = $(e.target);
      this.submitForm(form, () => {
        $('#exampleModal').modal('hide');
        this.loadPermissions();
      });
    }

    submitForm(form, successCallback) {
      this.showLoader();
      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        success: (response) => {
          if (response.success) {
            this.showAlert('success', response.message);
            if (typeof successCallback === 'function') {
              successCallback();
            }
          } else if (response.errors) {
            this.displayFormErrors(form, response.errors);
          }
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    // Action handlers
    deleteItem(e, type) {
      e.preventDefault();
      const url = $(e.currentTarget).data('url');
      this.confirmDelete(() => {
        this.showLoader();
        $.ajax({
          url: url,
          type: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: (response) => {
            this.showAlert('success', response.success || response.message || 'Élément supprimé avec succès');
            this[`load${type.charAt(0).toUpperCase() + type.slice(1)}`]();
          },
          error: (xhr) => this.handleError(xhr)
        });
      });
    }

    // Toggle status methods - Version consolidée
    toggleUserStatus(e) {
      const switchElement = $(e.currentTarget);
      const url = switchElement.data('url');
      const isChecked = switchElement.is(':checked');
      const status = isChecked ? 'active' : 'inactive';

      this.showLoader();
      $.ajax({
        url: url,
        type: 'PATCH',
        data: { status: status },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (response) => {
          this.showAlert('success', response.message);
          switchElement.next('label').text(response.status === 'active' ? 'Actif' : 'Inactif');
          this.loadUsers();
        },
        error: (xhr) => {
          switchElement.prop('checked', !isChecked);
          this.handleError(xhr);
        }
      });
    }

    toggleUserStatusMenu(e) {
      e.preventDefault();
      const link = $(e.currentTarget);
      const url = link.data('url');
      const currentStatus = link.data('status');
      const newStatus = currentStatus === 'active' ? 'inactive' : 'active';

      this.showLoader();
      $.ajax({
        url: url,
        type: 'PATCH',
        data: { status: newStatus },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (response) => {
          this.showAlert('success', response.message);
          this.loadUsers();
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    viewUserRoles(e) {
      e.preventDefault();
      const url = $(e.currentTarget).data('url');
      console.log("Loading user roles view with URL:", url);

      this.showLoader();
      $.ajax({
        url: url,
        type: 'GET',
        success: (response) => {
          $('#blog-container').html(response);
        },
        error: (xhr) => this.handleError(xhr)
      });
    }

    // Méthode corrigée pour supprimer un rôle avec confirmation et rechargement de page
    removeRoleFromUser(e) {
      e.preventDefault();
      const link = $(e.currentTarget);
      const url = link.data('url');

      console.log("Removing role with URL:", url);

      this.confirmDelete(() => {
        this.showLoader();
        $.ajax({
          url: url,
          type: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: (response) => {
            console.log("Role removal response:", response);
            this.showAlert('success', response.message || 'Rôle supprimé avec succès');
            // Utiliser un timeout pour s'assurer que l'alerte est visible avant le rechargement
            setTimeout(() => {
              window.location.reload();
            }, 1000);
          },
          error: (xhr) => {
            console.error("Error in role removal:", xhr);
            this.handleError(xhr);
            // En cas d'erreur, recharger également la page après un court délai
            setTimeout(() => {
              window.location.reload();
            }, 2000);
          }
        });
      });
    }

   // Méthode corrigée pour révoquer une permission avec confirmation et rechargement de page
   revokePermissionFromUser(e) {
        e.preventDefault();
        const link = $(e.currentTarget);
        const url = link.data('url');
         // Assurez-vous d'ajouter cet attribut dans votre HTML

        console.log("Revoking permission with URL:", url);

        this.confirmDelete(() => {
            this.showLoader();
            $.ajax({
                url: url,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (response) => {
                    console.log("Permission revocation response:", response);
                    if (response.success) {
                        this.showAlert('success', response.message );
                    } else if (response.warning) {
                        this.showAlert('warning', response.message);
                    } else {
                        this.showAlert('danger', response.message || 'Une erreur est survenue');
                    }
                    // Utiliser un timeout pour s'assurer que l'alerte est visible avant le rechargement
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);


                },
                error: (xhr) => {
                    console.error("Error in permission revocation:", xhr);
                    this.handleError(xhr);
                    // En cas d'erreur, recharger également la page après un court délai
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                }
            });
        });
    }


    applyFilters() {
        const role = $('#role-filter').val();
        const status = $('#status-filter').val();

        console.log('Applying filters:', { role, status });

        this.showLoader();
        $.ajax({
          url: $('#load-users').data('user-url'),
          type: 'GET',
          data: {
            role: role,
            status: status
          },
          success: (response) => {
            $('#blog-container').html(response);
            this.initDataTable('#users-table');
            this.initSelect2();

            // Restaurer les valeurs des filtres après le rechargement
            if (role) $('#role-filter').val(role);
            if (status) $('#status-filter').val(status);
          },
          error: (xhr) => this.handleError(xhr)
        });
    }

    // Utility methods
    confirmDelete(callback) {
      Swal.fire({
        title: 'Êtes-vous sûr?',
        text: "Cette action est irréversible!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer!',
        cancelButtonText: 'Non, annuler'
      }).then((result) => {
        if (result.isConfirmed) {
          callback();
        }
      });
    }

    showLoader() {
      $('#blog-container').html('<div class="text-center py-5"><div class="spinner-border text-primary" role="status"><span class="sr-only">Chargement...</span></div></div>');
    }

    showAlert(type, message) {
      const alert = $(`
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
          ${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      `);
      $('#alert-container').html(alert);
      setTimeout(() => alert.alert('close'), 5000);
    }

    handleError(xhr) {
      let message = 'Une erreur est survenue';
      if (xhr.responseJSON && xhr.responseJSON.message) {
        message = xhr.responseJSON.message;
      }
      this.showAlert('danger', message);
      console.error("AJAX Error:", xhr); // Ajout de débogage détaillé
    }

    displayFormErrors(form, errors) {
      form.find('.is-invalid').removeClass('is-invalid');
      form.find('.invalid-feedback').remove();

      $.each(errors, (field, messages) => {
        const input = form.find(`[name="${field}"]`);
        input.addClass('is-invalid');
        input.after(`<div class="invalid-feedback">${messages.join('<br>')}</div>`);
      });
    }

    initDataTable(selector) {
      if ($.fn.DataTable.isDataTable(selector)) {
        $(selector).DataTable().destroy();
      }
      $(selector).DataTable({
        responsive: true,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/French.json'
        },
        pageLength: 10
      });
    }

    initSelect2() {
      $('.select2').select2({
        dropdownParent: $('#exampleModal'),
        width: '100%'
      });
    }
}

// Initialize when document is ready
$(document).ready(function() {
    console.log("Document ready - initializing AdminManager");
    new AdminManager();
});

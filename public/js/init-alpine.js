function data() {
    function getThemeFromLocalStorage() {
      // if user already changed the theme, use it
      if (window.localStorage.getItem('dark')) {
        return JSON.parse(window.localStorage.getItem('dark'))
      }
  
      // else return their preferences
      return (
        !!window.matchMedia &&
        window.matchMedia('(prefers-color-scheme: dark)').matches
      )
    }
  
    function setThemeToLocalStorage(value) {
      window.localStorage.setItem('dark', value)
    }
  
    return {
      dark: getThemeFromLocalStorage(),
      toggleTheme() {
        this.dark = !this.dark
        setThemeToLocalStorage(this.dark)
      },
      isSideMenuOpen: false,
      toggleSideMenu() {
        this.isSideMenuOpen = !this.isSideMenuOpen
      },
      closeSideMenu() {
        this.isSideMenuOpen = false
      },
      isNotificationsMenuOpen: false,
      toggleNotificationsMenu() {
        this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
      },
      closeNotificationsMenu() {
        this.isNotificationsMenuOpen = false
      },
      isProfileMenuOpen: false,
      toggleProfileMenu() {
        this.isProfileMenuOpen = !this.isProfileMenuOpen
      },
      closeProfileMenu() {
        this.isProfileMenuOpen = false
      },
      isPagesMenuOpen: false,
      togglePagesMenu() {
        this.isPagesMenuOpen = !this.isPagesMenuOpen
      },
      // Modal
      isModalOpen: false,
      trapCleanup: null,
      openModal() {
        this.isModalOpen = true
        this.trapCleanup = focusTrap(document.querySelector('#modal'))
      },
      closeModal() {
        this.isModalOpen = false
        this.trapCleanup()
      },
      // Add Item
      isItemOpen: false,
      trapCleanup: null,
      openItem() {
        this.isItemOpen = true
        this.trapCleanup = focusTrap(document.querySelector('#modal-add-item'))
      },
      closeItem() {
        this.isItemOpen = false
        this.trapCleanup()
      },
      // Add Job
      isJobOpen: false,
      trapCleanup: null,
      openJob() {
        this.isJobOpen = true
        this.trapCleanup = focusTrap(document.querySelector('#modal-add-job'))
      },
      closeJob() {
        this.isJobOpen = false
        this.trapCleanup()
      },
      
      // Add Org
      isOrgOpen: false,
      trapCleanup: null,
      openOrg() {
        this.isOrgOpen = true
        this.trapCleanup = focusTrap(document.querySelector('#modal-add-org'))
      },
      closeOrg() {
        this.isOrgOpen = false
        this.trapCleanup()
      },
      // Add Wype
      isWipeOpen: false,
      trapCleanup: null,
      openWipe() {
        this.isWipeOpen = true
        this.trapCleanup = focusTrap(document.querySelector('#modal-add-wipe'))
      },
      closeWipe() {
        this.isWipeOpen = false
        this.trapCleanup()
      },
      // Add Perm
      isPermOpen: false,
      trapCleanup: null,
      openPerm() {
        this.isPermOpen = true
        this.trapCleanup = focusTrap(document.querySelector('#modal-add-perm'))
      },
      closePerm() {
        this.isPermOpen = false
        this.trapCleanup()
      },
    }
  }
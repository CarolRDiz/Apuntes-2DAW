# Javascript

## Navigation

### Navigation options

    /**
    	 * Navigation options
    	 */
    	const NAVIGATION_OPTIONS = {
    		TOP: "top",
    		NEW: "new",
    		BEST: "best",
    		ASK: "ask",
    		SHOW: "show",
    		JOB: "job",
    		FAVORITES: "favorites",
    		SETTINGS: "settings",
    	};

### Update the DOM for the selected section

    /**
    	 * Updates the DOM for the selected section
    	 * @param {string} option
    	 * @returns {void}
    	 */
    	function updateDOMForNavigationOption(option) {
    		Object.entries(NAVIGATION_OPTIONS).forEach(([_, value]) => {
    			if (value === option) {
    				$ref(`#nav-button-${value}`)
    					.classList.add("text-link-button-selected");
    			} else {
    				$ref(`#nav-button-${value}`)
    					.classList.remove("text-link-button-selected");
    			}
    			$ref(`#${value}-outlet`).style.display =
    				value === option ? "block" : "none";
    		});
    	}

## Modal

### Sets `modal` on top of other modals with z-index

    /**
    	 * Sets `modal` on top of other modals with z-index
    	 * @param {HTMLElement} modal
    	 * @param {boolean} delay
    	 * @returns {void}
    	 */
    	function setModalOnTop(modal, delay = true) {
    		const activeModals = Array.from(
    			document.querySelectorAll(".modal")
    		);
    		activeModals.forEach((m) => m.style.zIndex = "99");
    
    		// The click event from another modal will set itself on top so delay is
    		// needed to ensure the modal is on top.
    		if (delay) {
    			setTimeout(() => {
    				modal.style.zIndex = "200";
    			}, 100);
    			return;
    		}

		modal.style.zIndex = "200";
	}

 ### Adds modal tiling behavior to modal
    
     /**
    	 * Adds modal tiling behavior to modal
    	 * @param {HTMLElement} modal
    	 * @returns {void}
    	 */
    	const useModalTilingBehavior = (modal) =>
    		modal.addEventListener("click", () =>
    			setModalOnTop(modal, false)
    		);

### Launch modals corresponding to search params in URL

    /**
    	 * Launch modals corresponding to search params in URL
    	 */
    	function launchModalsFromNavigationParams() {
    		const currentURL = new URL(window.location.href);
    
    		const storyModalIdList = currentURL.searchParams.get("storyModalIdList");
    		if (storyModalIdList) {
    			const storyIds = storyModalIdList.split(",");
    			storyIds.forEach((storyId) => {
    				API.item(storyId).then((story) => new StoryModal(story));
    			});
    		}
    
    		const profileModalIdList =
    			currentURL.searchParams.get("profileModalIdList");
    		if (profileModalIdList) {
    			const profileIds = profileModalIdList.split(",");
    			profileIds.forEach((profileId) => {
    				new UserModal(profileId);
    			});
    		}
    	}

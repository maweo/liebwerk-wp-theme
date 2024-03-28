
export const initPostGrid = () => {
    // Desktop
    const postGridDesktop = document.querySelector('.post-grid__posts-desktop')
    const paginationButtonPreviousDesktop = document.querySelector('.post-grid__pagination-button--previous.post-grid__pagination-button--desktop')
    const paginationButtonNextDesktop = document.querySelector('.post-grid__pagination-button--next.post-grid__pagination-button--desktop')

    // Mobile
    const postGridMobile = document.querySelector('.post-grid__posts-mobile')
    const paginationButtonPreviousMobile = document.querySelector('.post-grid__pagination-button--previous.post-grid__pagination-button--mobile')
    const paginationButtonNextMobile = document.querySelector('.post-grid__pagination-button--next.post-grid__pagination-button--mobile')

    // Helper Functions
    const categoryButtons = document.querySelectorAll('.post-grid__category-button');

    const getFreshPostGridData = (element) => ({...element.dataset})

    const updatePagination = (direction, postGrid, postGridData) => {
        const data = new FormData();
        data.append('action', 'get_pagination_data_by_ajax')
        data.append('currentPage', parseInt(postGridData.page))
        data.append('postsPerPage', parseInt(postGridData.postsPerPage))
        data.append('postType', postGridData.postType)
        data.append('direction', direction)
        data.append('security', postGridData.security)
        data.append('category', postGridData.category)

        fetch(postGridData.ajaxurl, {
            method: "POST",
            credentials: 'same-origin',
            body: data
        })
        .then(function(response) {
            if(response.ok) {
                return response.text()
            } else {
                console.log(response)
            }
        }).then(function(data) {
            postGrid.querySelector('.post-grid__pagination-current').innerHTML = direction == "next" ? parseInt(postGridData.page) + 1 : parseInt(postGridData.page) - 1
            postGrid.querySelector('.post-grid__pagination-max').innerHTML = parseInt(data)
            postGrid.dataset.page = direction == "next" ? parseInt(postGridData.page) + 1 : parseInt(postGridData.page) - 1
            postGrid.dataset.maxPages = parseInt(data)

            if(parseInt(postGrid.dataset.page) > 1) {
                postGrid.querySelector('.post-grid__pagination-button--previous').disabled = false;
            } else {
                postGrid.querySelector('.post-grid__pagination-button--previous').disabled = true;
            }

            if(parseInt(postGrid.dataset.page) == parseInt(postGrid.dataset.maxPages)) {
                postGrid.querySelector('.post-grid__pagination-button--next').disabled = true;
            } else {
                postGrid.querySelector('.post-grid__pagination-button--next').disabled = false;
            }
        })
        .catch((error) => {
            console.error("Error", error)
        });
    }

    const getNewPostData = (direction, postGrid) => {
        const postGridData = getFreshPostGridData(postGrid)
        const data = new FormData();
        data.append('action', 'load_posts_by_ajax')
        data.append('currentPage', parseInt(postGridData.page))
        data.append('postsPerPage', parseInt(postGridData.postsPerPage))
        data.append('postType', postGridData.postType)
        data.append('direction', direction)
        data.append('security', postGridData.security)
        data.append('category', postGridData.category)

        fetch(postGridData.ajaxurl, {
            method: "POST",
            credentials: 'same-origin',
            body: data
        })
        .then(function(response) {
            if(response.ok) {
                return response.text()
            } else {
                console.log(response)
            }
        }).then(function(data) {
            postGrid.querySelector('.post-grid__post-container').innerHTML = data
            updatePagination(direction, postGrid, postGridData)
            postGrid.scrollIntoView({block: "start", behavior: "smooth"})
        })
        .catch((error) => {
            console.error("Error", error)
        });
    }

    // Events
    paginationButtonPreviousDesktop.addEventListener('click', () => {
        getNewPostData("prev", postGridDesktop)
    })

    paginationButtonNextDesktop.addEventListener('click', () => {
        getNewPostData("next", postGridDesktop)
    })

    paginationButtonPreviousMobile.addEventListener('click', () => {
        getNewPostData("prev", postGridMobile)
    })

    paginationButtonNextMobile.addEventListener('click', () => {
        getNewPostData("next", postGridMobile)
    })

    categoryButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const dataDesktop = getFreshPostGridData(postGridDesktop)
            const dataMobile = getFreshPostGridData(postGridMobile)

            categoryButtons.forEach((btn) => btn.classList.remove('post-grid__category-button--active'))

            postGridDesktop.dataset.page = 0
            postGridMobile.dataset.page = 0

            if(parseInt(dataDesktop.category) == button.dataset.category || parseInt(dataMobile.category) == button.dataset.category) {
                postGridDesktop.dataset.category = ""       
                postGridMobile.dataset.category = ""
            } else {
                postGridDesktop.dataset.category = button.dataset.category           
                postGridMobile.dataset.category = button.dataset.category                
                button.classList.add('post-grid__category-button--active')
            }

            getNewPostData("next", postGridDesktop)    
            getNewPostData("next", postGridMobile)
        })
    })
}

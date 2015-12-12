Gitstud::Application.routes.draw do
  # The priority is based upon order of creation: first created -> highest priority.
  # See how all your routes lay out with "rake routes".

  # You can have the root of your site routed with "root"
  # root 'welcome#index'
  root  :to=>'main#index'
  # Example of regular route:
  #   get 'products/:id' => 'catalog#view'
  resources :main ,:only => [] do
    collection do
      get :sign
      get :sign_out
      post :sign_in
      post :sign_up
    end
  end

  resources :student ,:only =>[] do
    collection do
      get :repositories
      get :assignments
      get :dashboard
    end
  end

  resources :instructor , :only=>[] do
    collection do
      get :assignments
      get :dashboard
    end
  end

  resources :assignment do
      resources :repository do
        member do
        post :add_students
      end
        get "/tree/:ref/*id" =>"tree#show"
        get "/tree/:ref" =>"tree#show"
        get("/commits/:ref/*id",:to=>"commits#index",:constraints=>{ id: /.+/, format: false})
        get "/commits/:ref" =>"commits#index"
        get "/commit/:id" =>"commits#show"
                  get(
            '/blob/:ref/*id',
            to: 'blob#show',
            constraints: { id: /.+/, format: false },
          )
      end
    member do
      get :assignment_repositories
    end
  end



  # Example of named route that can be invoked with purchase_url(id: product.id)
  #   get 'products/:id/purchase' => 'catalog#purchase', as: :purchase

  # Example resource route (maps HTTP verbs to controller actions automatically):
  #   resources :products

  # Example resource route with options:
  #   resources :products do
  #     member do
  #       get 'short'
  #       post 'toggle'
  #     end
  #
  #     collection do
  #       get 'sold'
  #     end
  #   end

  # Example resource route with sub-resources:
  #   resources :products do
  #     resources :comments, :sales
  #     resource :seller
  #   end

  # Example resource route with more complex sub-resources:
  #   resources :products do
  #     resources :comments
  #     resources :sales do
  #       get 'recent', on: :collection
  #     end
  #   end

  # Example resource route with concerns:
  #   concern :toggleable do
  #     post 'toggle'
  #   end
  #   resources :posts, concerns: :toggleable
  #   resources :photos, concerns: :toggleable

  # Example resource route within a namespace:
  #   namespace :admin do
  #     # Directs /admin/products/* to Admin::ProductsController
  #     # (app/controllers/admin/products_controller.rb)
  #     resources :products
  #   end
end

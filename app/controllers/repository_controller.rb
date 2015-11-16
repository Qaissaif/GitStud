class RepositoryController < ApplicationController

	before_filter :load_repository , :only=>[:show,:edit]


	def load_repository
		 	if repo=Repository.where(:name=>params[:id]).last
				@repoistory=Gitlab::Git::Repository.new("repositories/#{repo.name}.git")
			end
	end

	def index
	end

	def new
	end

	def create
	end

	def show
		@tree= Gitlab::Git::Tree.where(@repoistory,"current","")
	end

	def edit
	end

	def update
	end

	def destroy
	end

	
end


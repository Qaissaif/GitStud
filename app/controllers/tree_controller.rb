class TreeController < ApplicationController
	before_filter :load_repository , :only=>[:show]


	def load_repository
		 	if repo=Repository.where(:name=>params[:repository_id]).last
				@repository=Gitlab::Git::Repository.new("/repositories/#{repo.name}.git")
			end
	end
	def show
		path=params[:id]
		if path.nil?
			path=""
		end
    @tree= Gitlab::Git::Tree.where(@repository,params[:ref],path)
	end

end

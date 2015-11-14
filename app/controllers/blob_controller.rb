class BlobController < ApplicationController
	before_filter :load_repository , :only=>[:show]

	def load_repository
		 	if repo=Repository.where(:name=>params[:repository_id]).last
				@repoistory=Gitlab::Git::Repository.new("repositories/#{repo.name}.git")
			end
	end

	def show
  	path=params[:id]
    @blob= Gitlab::Git::Blob.find(@repoistory,params[:ref],path)
	end
end

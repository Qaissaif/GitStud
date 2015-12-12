class CommitsController < ApplicationController
	before_filter :load_repository
	layout "code_layout"

	def load_repository
		 	if repo=Repository.where(:name=>params[:repository_id]).last
				@repository=Gitlab::Git::Repository.new("/repositories/#{repo.name}.git")
			end
	end

	def index
		path=params[:id]
		if path.nil?
			path=""
		end
		    options = {
      repo: @repository,
      ref: params[:ref],
      path: path
    }   
    @commits = Gitlab::Git::Commit.where(options)
	@assignment=Assignment.find(params[:assignment_id])
	end

	def show
		@html=[]
		commit_id=params[:id]
		@commit=Gitlab::Git::Commit.find(@repository,commit_id)
		@commit.diffs.each do |diff|
			@html << CodeRay.scan(diff.diff, :diff).div(:line_numbers=>:table,:css=>:class)
		end
	end

end

class CommitsController < ApplicationController
	before_filter :load_repository


	def load_repository
		 	if repo=Repository.where(:name=>params[:repository_id]).last
				@repoistory=Gitlab::Git::Repository.new("repositories/#{repo.name}.git")
			end
	end

	def index
		path=params[:id]
		if path.nil?
			path=""
		end
		@commits=@repoistory.find_commits({:ref=>params[:ref],:path=>path})
	end

	def show
		@html=[]
		commit_id=params[:id]
		@commit=Gitlab::Git::Commit.find(@repoistory,commit_id)
		@commit.diffs.each do |diff|
			@html << "<div class='jumbotron' style='background-color:transparent;'>"+CodeRay.scan(diff.diff, :diff).html( :css => :class,:line_numbers =>:table)+"</div>"
		end
	end

end

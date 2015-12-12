class BlobController < ApplicationController
	before_filter :load_repository , :only=>[:show]
      layout "code_layout"

	def load_repository
		if repo=Repository.where(:name=>params[:repository_id]).last
			@repository=Gitlab::Git::Repository.new("/repositories/#{repo.name}.git")
		end
	end

	def show
  	path=params[:id]
    @blob= Gitlab::Git::Blob.find(@repository,params[:ref],path)
    @path=@blob.path
    @html=CodeRay.scan(@blob.data, :ruby).div(:line_numbers => :table,:css=>:style)
	end
end

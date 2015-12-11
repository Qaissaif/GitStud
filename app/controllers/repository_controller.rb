class RepositoryController < ApplicationController
layout "inner_layout"
	before_filter :load_repository , :only=>[:show,:edit]


	def load_repository
		 	if repo=Repository.where(:name=>params[:id]).last
				@repository=Gitlab::Git::Repository.new("/repositories/#{repo.name}.git")
			end
	end

	def index
	end

	def new
		@repository=Repository.new
	end

	def create
		@assignment=Assignment.find(params[:assignment_id])
		my_project=params[:repository][:name]
		params.permit!
		@repository=@assignment.repositories.new(url:params[:repository][:name],name:params[:repository][:name],:super_std=>@current_student.id)
		@repository.students << @current_student
		@current_student.repositories << @repository
		@assignment.repositories.new
		if @repository.save! && @current_student.save!
		system "sudo mkdir /repositories/#{my_project}.git && cd /repositories/#{my_project}.git && sudo git init --bare --share"
		system "sudo mkdir /first_commit/#{my_project} && cd /first_commit/#{my_project} && sudo touch README.txt && sudo git init && sudo git add . && sudo git commit -m 'Initial commit' && sudo git push origin master"
		redirect_to dashboard_student_index_path,:flash => { :success => "Repository created" }
		end
	end

	def show
		@tree= Gitlab::Git::Tree.where(@repository,"master","")
	end

	def edit
	end

	def update
	end

	def destroy
	end

	
end

